<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\BooksController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', [BooksController::class, 'Index']);

Route::get('/books/create', [BooksController::class, 'create']);

Route::get('/books/{id}', [BooksController::class, 'show']);

Route::post('/books', [BooksController::class, 'store'])->name('SaveBook');

Route::get('/books/{id}/edit', [BooksController::class, 'edit']);

Route::put('/books/{id}', [BooksController::class, 'update'])->name('UpdateBook');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
