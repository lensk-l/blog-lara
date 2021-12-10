<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [ArticleController::class, 'showAll'])->name('allArticles')->middleware(['auth']);
Route::get('/author/{author}', [ArticleController::class, 'showByAuthor'])->name('allByAuthor')->middleware(['auth']);
Route::get('/subscribe/{author}', [ArticleController::class, 'subscribe'])->name('subscribe')->middleware(['auth']);
Route::get('/like/{author}', [ArticleController::class, 'like'])->name('like')->middleware(['auth']);
Route::get('/unsubscribe/{author}', [ArticleController::class, 'unsubscribe'])->name('unsubscribe')->middleware(['auth']);
Route::get('/subscribes', [ArticleController::class, 'allSubscribe'])->name('allSubscribes')->middleware(['auth']);
Route::get('/search', [ArticleController::class, 'search'])->name('search')->middleware(['auth']);
Route::get('/category/{name}', [CategoryController::class, 'show'])->name('category_show')->middleware(['auth']);
Route::resource('article', ArticleController::class)->middleware(['auth']);



