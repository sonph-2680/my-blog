<ul class="m-0 p-0">
    @foreach ($posts as $post)
        <li class="card p-3 mb-3">
            <div class="d-flex align-items-center">
                <a href="{{route('user.posts', ['user'=>$post->user->id])}}">{{$post->user->name}}</a>
                <div style="font-size: 0.4rem;">
                    <i class="mx-3 fa fa-circle fa-xs text-secondary"></i>
                </div>
                <p class="text-secondary m-0"><small>{{$post->created_at->diffForHumans()}}</small></p>
            </div>
            <a href="{{route('posts.show', $post->id)}}" class="font-weight-bold text-dark h5 mt-2">
                {{$post->title}}
            </a>
        </li>
    @endforeach
</ul>
{{ $posts->links('pagination::bootstrap-4') }}