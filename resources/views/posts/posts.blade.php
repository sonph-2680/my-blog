@extends('layout.app')

@section('content')
@if ($isMine ?? false)
    <div class="d-flex justify-content-between">
        <h4 class="d-flex align-items-center font-weight-bold">My Posts</h4>
        <a href="{{route('posts.create')}}" class="btn btn-primary mb-3">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </a>
    </div>
    @include('posts.my_list', ['posts' => $posts])
@else
    <div class="d-flex justify-content-between">
        <h4 class="d-flex align-items-center font-weight-bold">{{$user->name}}'s Posts</h4>
    </div>
    @include('posts.list', ['posts' => $posts])
@endif
@endsection