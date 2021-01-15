<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Vote;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with(['user', 'post'])->latest()->paginate(10);

        return view('posts.comments', [
            'comments' => $comments
        ]);
    }

    public function store(Post $post, Request $request)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

        $request->user()->comments()->create([
            'comment' => $request->comment,
            'post_id' => $post->id
        ]);

        return back();
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return back();
    }

    public function edit(Comment $comment)
    {
        $this->authorize('edit', $comment);

        return view('posts.editcomments', [
            'comment' => $comment
        ]);
    }

    public function update(Comment $comment, Post $post, Request $request)
    {
        $this->authorize('edit', $comment);

        $comment->update([
            'comment' => $request->comment,
        ]);

        return redirect('/posts/' . $comment->post->id);
    }

    public function vote(Comment $comment)
    {
        $comment->vote()->create([
            'user_id' => auth()->user()->id,
            'comment_id' => $comment->id
        ]);
        return back();
    }

    public function deleteVote(Comment $comment)
    {
        Vote::where('user_id', auth()->user()->id)->where('comment_id', $comment->id)->delete();
        return back();
    }
}
