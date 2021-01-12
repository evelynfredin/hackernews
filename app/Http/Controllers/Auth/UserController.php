<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validation
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'username' => 'required|unique:users|max:255|alpha_num|min: 4',
            'password' => 'required|confirmed|min:6',
        ]);

        // Store in database
        User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        // Sign in user
        Auth::attempt($request->only('email', 'password'));

        return redirect()->route('settings', auth()->user()->id);
    }
}
