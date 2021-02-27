<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    public function Index()
    {
        $books = DB::table('books')->get();
        return view('book.index', compact('books'));
    }

    public function Show($id)
    {
        $book = DB::table('books')->find($id);
        return view('book.show', compact('book'));
    }
}
