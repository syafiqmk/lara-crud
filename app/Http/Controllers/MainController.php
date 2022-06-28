<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    //home
    public function index() {

        return view('posts.index', [
            'title' => 'Home',
            'posts' => Posts::latest()->search(request('search'))->paginate(10)->withQueryString()
        ]);
    }
}
