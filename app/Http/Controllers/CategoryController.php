<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function show($name) {

        $category = Category::where('name', $name)->get()->first();

        return view('categories.all_in_category', [
            'articles' => $category->article()->get(),
            'category' => $category,
        ]);
    }
}
