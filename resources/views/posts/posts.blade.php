@extends('layout.app')

@section('content')
@if ($isMine ?? false)
    @include('posts.my_list', ['posts' => $posts])
@else
    @include('posts.list', ['posts' => $posts])
@endif
@endsection