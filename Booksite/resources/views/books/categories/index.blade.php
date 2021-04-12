@extends('layouts.app')
@section('title')
    Categories
@endsection
@section('Add')
<a href="{{url('/books')}}" class="text-sm text-gray-700 underline">Books</a>
<a href="{{ url('/books/create/category') }}" class="text-sm text-gray-700 underline">Add</a>
@endsection
<style>
    p{
        color:0080FF;
    }
</style>
@section('content')
@foreach($categories as $category)
        <div style="padding-left: 60px; font-size: x-large">
            <p>{{$category->name}}</p>
         </div>
    @endforeach
@endsection
