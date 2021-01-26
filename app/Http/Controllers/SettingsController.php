<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


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
            'avatar' => 'image|nullable|mimes:png,jpg',
            'urlImage' => 'nullable'
        ]);

        // $request->avatar === null ? $request->request->remove('avatar') : '';
        $request->avatar != null && $request->urlImage != null ? $request->request->remove('urlImage') : '';
        $request->urlImage === null ? $request->request->remove('urlImage') : '';


        if ($request->urlImage != null) {

            $length = 40;
            $image = file_get_contents($request->urlImage);
            preg_match("/^.*\.(jpg|jpeg|png|gif)$/i", $request->urlImage, $fileName);
            $fileExtension = $fileName[1];
            $newFileName = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
            $newFileName = $newFileName . '.' . $fileExtension;
            Storage::put('uploads/avatars/' . $newFileName . '', $image);

            $request->request->remove('urlImage');
            $request->request->add(['url' => 'uploads/avatars/' . $newFileName]);
        }

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
                'avatar' => $request->url
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

    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect('/');
    }
}
