@extends('layouts.app')
@section('title')
    Books
@endsection
@section('Add')
<a href="{{ url('/books/create') }}" class="text-sm text-gray-700 underline">Add</a>
@endsection
@section('content')
    @foreach($books as $book)
        <div style="padding-left: 60px; font-size: x-large">
            <a href={{"/books/".$book->id}}>{{$book->Name}}</a>
            <p>Creator: {{$book->user->name}}</p>
        </div>
    @endforeach
@endsection
