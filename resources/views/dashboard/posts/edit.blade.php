@extends('layouts.dashboard')

@section('content')
    <div class="col-md-8">
        <form action="/dashboard/posts/update/{{ $post->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> --}}
            <div class="mb-3">
                <label for="">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Title" autocomplete="off" required value="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label for="">Body</label>
                <input type="hidden" name="body" id="body" value="{{ $post->body }}">
                <trix-editor input="body" style="min-height:30vh;"></trix-editor>
            </div>

            <div class="mb-3">
                <button type="submit"class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <script>
        window.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });
    </script>
@endsection