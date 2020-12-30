<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

        // dd($post);

        $request->user()->comments()->create([
            'comment' => $request->comment,
            'post_id' => $post->id
        ]);

        // $post->user()->comments()->create([
        //     'comment' => $request->comment,
        // ]);

        return back();
    }
}
