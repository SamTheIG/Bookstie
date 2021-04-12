@extends('layouts.app')
<style>
    form{
        padding-left: 460px;
        padding-right: 460px;
    }
</style>
@section('content')
    <form method="POST" action="{{route('UpdateBook', ['id' => $book->id])}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input type="text" class="form-control" name="Name" id="Name" value="{{$book->Name}}" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="Pages" class="form-label">Pages</label>
            <input type="number" class="form-control" name="Pages" id="Pages" value="{{$book->Pages}}">
        </div>
        <div class="mb-3">
            <label for="ISBN" class="form-label">ISBN</label>
            <input type="text" class="form-control" name="ISBN" id="ISBN" value="{{$book->ISBN}}">
        </div>
        <div class="mb-3">
            <label for="Price" class="form-label">Price</label>
            <input type="number" class="form-control" name="Price" id="Price" value="{{$book->Price}}">
        </div>
        <div class="mb-3">
            <label for="Published_at" class="form-label">Published_at</label>
            <input type="date" class="form-control" name="Published_at" id="Published_at" value="{{$book->Published_at}}">
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Authors</label>
            <select name="author_id[]", id="author", class="form-control" multiple>
                @foreach($authors as $author)

                    <option value="{{$author->id}}" {{$book->authors->contains('id', $author->id) ? 'selected' : ''}}>
                        {{$author->name}}
                    </option>

                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category_id[]", id="category", class="form-control" multiple>
                @foreach($categories as $category)

                    <option value="{{$category->id}}" {{$book->categories->contains('id', $category->id) ? 'selected' : ''}}>
                        {{$category->name}}
                    </option>

                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    @include('shared.errors')
@endsection
