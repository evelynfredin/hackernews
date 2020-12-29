<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'votes'])->paginate(10);
        return view('news.index', [
            'posts' => $posts
        ]);
    }

    public function latest()
    {
        $posts = Post::with(['user', 'votes'])->latest()->paginate(10);
        return view('news.latest', [
            'posts' => $posts
        ]);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }
}
