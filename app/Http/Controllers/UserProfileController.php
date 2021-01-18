<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index(User $user)
    {
        // $posts = Post::with(['user', 'votes', 'comments'])->get();
        // return view('users.profile.index', compact('user', 'posts'));
        $posts = $user->posts()->with(['user', 'votes'])->get();

        return view('users.profile.index', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
