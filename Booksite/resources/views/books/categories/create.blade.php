@extends('layouts.app')
<style>
    form{
        padding-left: 460px;
        padding-right: 460px;
    }
</style>
@section('content')
    <form method="POST" action="{{route('SaveCategory')}}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" aria-describedby="emailHelp">
        </div>
        
        <button type="submit" class="btn btn-success">Save</button>
    </form>
    @include('shared.errors')
@endsection
