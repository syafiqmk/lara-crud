@extends('layouts.dashboard')

@section('content')
    <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create Post</a>

    <table class="table">
        <thead>
            <th>#</th>
            <th>Title</th>
            <th>Created at</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                        <a href="/dashboard/posts/show/{{ $post->id }}" class="btn btn-success">Detail</a>
                        <a href="/dashboard/posts/edit/{{ $post->id }}" class="btn btn-success">Edit</a>
                        <a href="/dashboard/posts/destroy/{{ $post->id }}" class="btn btn-success">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection