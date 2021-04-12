@extends('layouts.app')
@section('title')
    Categories
@endsection
@section('Add')
<a href="{{url('/books')}}" class="text-sm text-gray-700 underline">Books</a>
<a href="{{ url('/books/create/author') }}" class="text-sm text-gray-700 underline">Add</a>
@endsection
<style>
    p{
        color:0080FF;
    }
    pre{
        color:FF8000;
    }
</style>
@section('content')
@foreach($authors as $author)
        <div style="padding-left: 60px; font-size: x-large">
            <pre>
            <p>Name:</p> {{$author->name}}
            <p>BirthDate:</P> {{$author->birthdate}}
            </pre>
         </div>
    @endforeach
@endsection
