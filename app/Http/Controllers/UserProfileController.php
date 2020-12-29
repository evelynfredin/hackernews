<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index(User $user)
    {
        $posts = $user->posts()->with(['user', 'votes'])->get();
        return view('users.profile.index', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
