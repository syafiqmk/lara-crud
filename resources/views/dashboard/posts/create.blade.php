@extends('layouts.dashboard')

@section('content')
    <div class="col-md-8">
        <form action="/dashboard/posts/store" method="post" enctype="multipart/form-data">
            @csrf
            {{-- <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> --}}
            <div class="mb-3">
                <label for="">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Title" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="">Body</label>
                <input type="hidden" name="body" id="body">
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