@extends('layout.app')

@section('content')
<div class="card col-md-9 mx-auto p-0 bg-white py-4 px-3 p-sm-5">    
    <h1 class="title">{{$post->title}}</h1>
    <div class="d-flex align-items-center">
        <a href="{{route('user.posts', ['user'=>$post->user->id])}}">{{$post->user->name}}</a>
        <div style="font-size: 0.4rem;">
            <i class="mx-3 fa fa-circle fa-xs text-secondary"></i>
        </div>
        <p class="text-secondary m-0"><small>{{$post->created_at->diffForHumans()}}</small></p>
    </div>
    <div class="ck-content mt-3">
        {!!$post->content!!}
    </div>
</div>
@endsection