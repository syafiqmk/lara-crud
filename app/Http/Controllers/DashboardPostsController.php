<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class DashboardPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'title' => 'Posts',
            'posts' => Posts::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'title' => 'Create Post',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required'
        ]);

        $post = new Posts;
        $post->title = ucwords($credentials['title']);
        $post->body = $credentials['body'];
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/dashboard/posts')->with('createPostSucces', 'Post Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Posts::where('id', $id)->first();
        // dd($posts);
        return view('dashboard.posts.show', [
            'title' => $post->title,
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::where('id', $id)->first();
        return view('dashboard.posts.edit', [
            'title' => 'Edit : '. $post->title,
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $credentials = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required'
        ]);

        $post = Posts::where('id', $id)->first();
        $post->title = ucwords($credentials['title']);
        $post->body = $credentials['body'];
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/dashboard/posts')->with('updatePostSuccess', 'Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Posts::where('id', $id)->delete();
        return redirect('/dashboard/posts')->with('deletePostSuccess', 'Post Deleted Successfully');
    }
}
