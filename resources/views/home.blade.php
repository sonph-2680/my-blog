@extends('layout.app')

@section('content')
{{-- {{ dd(get_defined_vars()['__data']) }} --}}
<div class="d-flex justify-content-end justify-content-sm-between">
    <h4 class="d-none d-sm-flex align-items-center font-weight-bold">Post List</h4>
    <nav class="navbar navbar-light bg-light pr-0">
        <form class="d-flex" action="{{ route('home')}}">
            <input class="form-control mr-2" name="search" type="search" placeholder="Search" aria-label="Search" value="{{request()->get('search')}}">
            <button class="btn btn-outline-primary my-0" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>
    </nav>
</div>
@include('posts.list', ['posts' => $posts])

@endsection