<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        return view('news.index', [
            'posts' => $posts
        ]);
    }

    public function latest()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('news.latest', [
            'posts' => $posts
        ]);
    }
}
