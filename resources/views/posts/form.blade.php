@extends('layout.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
            @if ($isEdit)
                Edit Post
            @else
                New Post
            @endif
        </div>

            <div class="card-body">
                <form method="POST" action="{{$isEdit ? route('posts.update', $post->id) : route('posts.store')}}">
                    {{method_field($isEdit ? 'PUT' : 'POST')}}
                    @csrf
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label">Title</label>
                        <div class="col-md-12">
                            <input id="title" type="text" class="form-control" name="title" value="{{ $post->title ?? '' }}" required>
                        </div>

                        <label for="content" class="col-md-4 col-form-label">Content</label>
                        <div class="col-md-12">
                            <textarea name="content" id="editor">
                                {{ $post->content ?? '' }}
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12 d-md-flex justify-content-between">
                            <select name="status" class="custom-select col-md-6 col-sm-12 mb-3 mb-sm-0">
                                <option value="draft" {{($post ?? true) || $post->status === 'draft' ? 'selected' : ''}}>Draft</option>
                                <option value="public" {{($post ?? false) && $post->status === 'public' ? 'selected' : ''}}>Public</option>
                            </select>
                            <div class="d-flex">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save" aria-hidden="true"></i>
                                </button>
                                @if($isEdit)
                                <a 
                                    href="{{route('posts.destroy', $post->id)}}" 
                                    class="btn btn-danger ml-3 d-flex flex-column justify-content-center"
                                >
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
@endsection