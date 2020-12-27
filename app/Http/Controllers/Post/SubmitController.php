<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubmitController extends Controller
{
    public function index()
    {
        return view('news.submit');
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

        return back(); // Redirect to the post itself once the post page has been created
    }
}
