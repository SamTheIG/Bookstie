<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use Redirect;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('create');
    }

    public function Index()
    {
        $books = DB::table('books')
            -> orderBy('Name')
            ->get();
        return view('books.index', compact('books'));
    }

    public function Show($id)
    {
        // $book = DB::table('books')
        //    ->find($id);
        $book = Book::findOrFail($id);
        // abort_unless($book, 404, 'Project not found');

        return view('books.show', compact('book'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|max:255',
            'Pages' => 'required|numeric',
            'ISBN' => 'required|size:10',
            'Price' => 'required|numeric',
            'Published_at' => 'required|date'
        ]);
        $books = Book::create($request->except('_token'));
        return Redirect::to('/books');
        // return view('books.index', compact('books'));
    }
}
