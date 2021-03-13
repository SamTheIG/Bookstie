<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    public function Index()
    {
        $books = DB::table('books')
            -> orderBy('Name')
            ->get();
        return view('books.index', compact('books'));
    }

    public function Show($id)
    {
        $book = DB::table('books')
            ->find($id);
        abort_unless($book, 404, 'Project not found');

        return view('books.show', compact('book'));
    }
}
