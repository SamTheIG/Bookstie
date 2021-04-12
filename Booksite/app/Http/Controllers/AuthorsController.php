<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Redirect;

class AuthorsController extends Controller
{
    public function showauthors()
    {
        $authors = Author::get();
        return view('books.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('books.authors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'birthdate' => 'required'
        ]);
        //dd($request->toArray());
        $books = Author::create($request->except('_token'));
        return Redirect::to('/books/authors');    
    }
}
