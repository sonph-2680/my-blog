<ul class="m-0 p-0">
    @foreach ($posts as $post)
    <li class="card col-md-12 p-3 mb-3">
        <div class="d-flex justify-content-between">
            <div class="col-10 col-sm-10">
                <div class="d-block d-sm-flex align-items-center">
                    @if ($post->status === 'public')
                        <span class="badge badge-success text-white">Public</span>
                    @else
                        <span class="badge badge-info text-white">Draft</span>
                    @endif
                    <div class="d-none d-sm-block" style="font-size: 0.4rem;">
                        <i class="mx-2 fa fa-circle fa-xs text-secondary"></i>
                    </div>
                    <p class="text-secondary m-0"><small>{{$post->created_at->diffForHumans()}}</small></p>
                </div>
                <a href="{{route('posts.show', $post->id)}}" class="font-weight-bold text-dark h5 mt-2">
                    {{$post->title}}
                </a>
            </div>
            <div class="col-2 col-sm-2 d-flex justify-content-end">
                <a 
                    href="{{route('posts.edit', $post->id)}}" 
                    class="d-flex flex-column justify-content-center"
                >
                    <i class="fa fa-pen text-primary" aria-hidden="true"></i>
                </a>
                <a
                    onclick="deletePost({{$post->id}})"
                    class="d-sm-flex ml-sm-3 mt-2 mt-sm-0 d-none flex-column justify-content-center"
                    style="cursor: pointer"
                    >
                    <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </li>
    @endforeach
</ul>
{{ $posts->links('pagination::bootstrap-4') }}
<script type="text/javascript">
    function deletePost(id){
        console.log($.ajax)
        $.ajax({
            url: `/posts/${id}`,
            type: 'DELETE',
            data:{
                "_token": "{{ csrf_token() }}",
            },
            success: function(data) {
                if(data.status === 'success'){
                    window.location.reload();
                }
            }
        });
    }
</script>