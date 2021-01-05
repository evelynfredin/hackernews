<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function edit(User $user)
    {
        $this->authorize('edit', $user);
        return view('users.settings', [
            'user' => $user
        ]);
    }

    public function update(User $user, Request $request)
    {
        $this->authorize('edit', $user);

        $this->validate($request, [
            'email' => 'required|email|max:255',
            'bio' => 'nullable',
            'avatar' => 'image|nullable|'
        ]);

        if ($request->avatar != null) {
            $user->update([
                'email' => $request->email,
                'bio' => $request->bio,
                'avatar' => $request->avatar->store('uploads/avatars')
            ]);
        } else {
            $user->update([
                'email' => $request->email,
                'bio' => $request->bio,
            ]);
        }

        return redirect('/user/' . auth()->user()->username);
    }

    public function passwordedit(User $user)
    {
        $this->authorize('edit', $user);
        return view('users.password', [
            'user' => $user
        ]);
    }

    public function passwordupdate(User $user, Request $request)
    {
        $this->authorize('edit', $user);

        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ]);

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect('/user/' . auth()->user()->username);
    }
}
