<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Models\Vote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Arr;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('submit');
    }

    public function submit()
    {
        return view('posts.submit');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'url' => 'url|nullable|required_without:description',
            'description' => 'required_without:url|nullable'
        ]);

        $request->user()->posts()->create([
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description
        ]);

        return redirect()->route('latest');
    }

    public function index()
    {
        $posts = Post::with('user', 'votes', 'comments')->withCount('votes')->orderByDesc('votes_count')->paginate(10);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function latest()
    {
        $posts = Post::with(['user', 'votes', 'comments'])->latest()->paginate(10);

        return view('posts.latest', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post, Comment $comments)
    {
        return view('posts.show', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect('/');
    }

    public function edit(Post $post)
    {
        $this->authorize('edit', $post);

        return view('posts.editpost', [
            'post' => $post
        ]);
    }

    public function update(Post $post, Request $request)
    {
        $this->authorize('edit', $post);

        $post->update([
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description
        ]);

        return redirect('/posts/' . $post->id);
    }
}
