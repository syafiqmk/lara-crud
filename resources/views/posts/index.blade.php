@extends('layouts.main')

@section('content')
    <h2 class="text-center">Data List</h2>

    {{-- search form --}}
    <div class="row d-flex justify-content-center my-4">
        <div class="col-md-7">
            <form action="/" method="get">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search..." autocomplete="off" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-danger">Search</button>
                </div>
            </form>
        </div>
    </div>

    {{-- data loop --}}
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-6 col-sm-12">
            <h3>{{ $post->title }}</h3>
            <p class="fs-6">By. {{ $post->author->name }} | {{ $post->created_at->diffForHumans() }}</p>
            <hr>
            <p class="text-justify">{{ Str::limit(strip_tags($post->body), 50, '...') }}</p>
            <a href="/post/{{ $post->id }}" class="ms-auto">Read More</a>
        </div>
        @endforeach
    </div>
@endsection