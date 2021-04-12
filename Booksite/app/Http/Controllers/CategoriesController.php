<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Redirect;

class CategoriesController extends Controller
{
    public function showcategories()
    {
        $categories = Category::get();
        return view('books.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('books.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        //dd($request->toArray());
        $books = Category::create($request->except('_token'));
        return Redirect::to('/books/categories');    
    }
}
