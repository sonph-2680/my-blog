@extends('layout.app')

@section('content')
{{-- {{ dd(get_defined_vars()['__data']) }} --}}
<div class="d-flex justify-content-between">
    <h4 class="d-flex align-items-center font-weight-bold">Post List</h4>
    <nav class="navbar navbar-light bg-light pr-0">
        <form class="form-inline" action="{{ route('home')}}">
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search" value="{{request()->get('search')}}">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>
    </nav>
</div>
@include('posts.list', ['posts' => $posts])

@endsection