<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Arr;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'votes', 'comments'])->paginate(10);
        return view('news.index', [
            'posts' => $posts
        ]);
    }

    public function latest()
    {
        $posts = Post::with(['user', 'votes', 'comments'])->latest()->paginate(10);
        return view('news.latest', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post, Comment $comments)
    {
        return view('news.show', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }
}
