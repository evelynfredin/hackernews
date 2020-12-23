<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validation
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'username' => 'required|max:255|alpha_num|min: 4',
            'password' => 'required|confirmed|min:6',
        ]);

        dd('store');
    }
}
