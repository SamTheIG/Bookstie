<?php

namespace App\Http\Controllers;

use App\Events\BookCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use Kavenegar\KavenegarApi;
use Redirect;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('create', 'edit');
    }

    public function Index()
    {
        /* $books = DB::table('books')
            -> orderBy('Name')
            ->get();
        */
        $books = Book::with(['user'])->orderBy('Name')->get();
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
        $authors = Author::all();
        $categories = Category::all();
        return view('books.create', compact('authors', 'categories'));
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
        /*
        $books = Book::create(array_add($request->except('_token'), Auth::user()->id));
            OR
        */
        $book = Auth::user()->books()->create($request->except('_token'));
        $book->authors()->attach($request->get('author_id'));
        $book->categories()->attach($request->get('category_id'));

        // event(new BookCreated($book), Auth::user());

        $client = new KavenegarApi(env('KAVENEGAR_API_KEY'));
        $client->send(env('SENDER_MOBILE'), env('RECIVER_MOBILE'), 'Hi');

        return Redirect::to('/books');
        // return view('books.index', compact('books'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        abort_if(($book->user->id != Auth::user()->id), HttpResponse::HTTP_UNAUTHORIZED);
        $authors = Author::all();
        $categories = Category::all();
        return view('books.edit', compact('book', 'authors', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->only(['Name', 'Pages', 'ISBN', 'Price', 'Published_at']));
        $book->authors()->sync($request->get('author_id'));
        $book->categories()->sync($request->get('category_id'));
        return view('books.show', compact('book'));
    }
}
