@extends('layouts.app')
@section('title')
    Books
@endsection
@section('content')
    @foreach($books as $book)
        <div style="font-size: x-large">
            <a href={{"/books/".$book->id}}>{{$book->Name}}</a>
        </div>
    @endforeach
@endsection
