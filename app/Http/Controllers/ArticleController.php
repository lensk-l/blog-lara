<?php

namespace App\Http\Controllers;

use App\Events\PostHasLiked;
use App\Events\PostHasViewed;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $subscribers = $user->subscribers()->allRelatedIds()->toArray();

        return view('index', [
            'articles' => $user->articles()->get(),
            'user' => $user,
            'subscribers' => $subscribers,
        ]);

    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function create(Request $request)
    {
        return view('articles.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $text = $request->input('text');
        $title = $request->input('title');
        $imgName = 'no_picture.png';
        $category_id = $request->input('category_id');

        if ($request->exists('userfile')) {
            $file = $request->userfile;
            $imgName = $file->getClientOriginalName();
            $file->move(public_path() . '/images', $imgName);
        }

        Article::create([
            'title' => $title,
            'text' => $text,
            'img' => $imgName,
            'author_id' => Auth::id(),
            'category_id' => $category_id,
        ]);

        return redirect('/article');
    }

    public function show($id)
    {
        $article = Article::where('id', $id)->get()->first();
        event(new PostHasViewed($article));
        return view('articles.post', [
            'article' => $article,
        ]);
    }

    /**
     * @return View
     */
    public function showAll(): View
    {
        $articles = Article::all();
        $user = Auth::user();
        $authors = $user->authors()->allRelatedIds()->toArray();

        return view('articles.all_stories', [
            'articles' => $articles,
            'authors' => $authors,
        ]);
    }

    public function showByAuthor($author)
    {
        $author = User::where('name', $author)->get()->first();
        $subscribers = $author->subscribers()->allRelatedIds()->toArray();


        return view('articles.author_stories', [
            'articles' => $author->articles()->get(),
            'user' => $author,
            'subscribers' => $subscribers,
        ]);
    }

    public function subscribe($id)
    {
        $user = User::find(Auth::id());
        $author = User::find($id);

        if (!$user->authors()->where('author_id', $id)->exists()) {
            $user->authors()->attach($id);
            return response()->json([
                'status' => 'success'
            ]);
        }

        return view('error.index', [
            'author' => $author,
        ]);

    }

    public function like($id)
    {
        $status = 'like already done';
        $article = Article::where('id', $id)->get()->first();

        if (!$article->likes()->where('user_id', Auth::id())->exists()) {
            event(new PostHasLiked($article));
            $article->likes()->attach(Auth::user());
            $status = 'success';
        }

        return response()->json([
            'status' => $status
        ]);
    }

    public function unsubscribe($id)
    {
        $user = User::find(Auth::id());
        $user->authors()->detach($id);


        return response()->json([
            'status' => 'success'
        ]);


    }

    public function allSubscribe()
    {
        $user = User::find(Auth::id());
        $authors = $user->authors()->with('articles')->get();

        return view('articles.subscribes', [
            'authors' => $authors,
        ]);
    }

    public function search(Request $request)
    {
        $search_data = $request->input('search');
        $articles = Article::where('title', 'like', "%$search_data%")->get();
        $user = Auth::user();
        $authors = $user->authors()->allRelatedIds()->toArray();


        return view('articles.all_stories', [
            'articles' => $articles,
            'authors' => $authors,
        ]);

    }

    public function edit($id)
    {
        return view('articles.edit', [
            'article' => Article::findOrFail($id)->toArray(),
            'categories' => Category::all(),
        ]);
    }


    public function update(Request $request, int $id)
    {
        $article = Article::findOrFail($id);
        $imgName = $article->img;

        if ($request->exists('userfile')) {
            $file = $request->userfile;
            $imgName = $file->getClientOriginalName();
            $file->move(public_path() . '/images', $imgName);
        }

        $article->title = $request->input('title', '');
        $article->text = $request->input('text', '');
        $article->category_id = (int)$request->input('category_id');
        $article->img = $imgName;

        $article->save();

        return redirect('/article');
    }


    public function destroy($id)
    {
        Article::where('id', $id)->delete();
    }
}
