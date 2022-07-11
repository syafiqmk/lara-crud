@extends('layouts.main')

@section('content')
    <h4>{{ $post->title }}</h4>
    <hr>
    <h6>By. {{ $post->author->name }} | {{ $post->created_at->diffForHumans()}}</h6>
    <hr>
    {!! $post->body !!}
@endsection