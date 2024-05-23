<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;


use App\Models\Film;

class PostController extends Controller
{
    public function index()
    {
        return Inertia::render('Post', [
            'films' => Film::all(),
        ]);
    }

    // public function create()
    // {
    //     return Inertia::render('Posts/Create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => ['required', 'max:255'],
    //         'body' => ['required'],
    //     ]);

    //     Post::create($request->all());

    //     return redirect()->route('posts.index');
    // }

    // public function edit(Post $post)
    // {
    //     return Inertia::render('Posts/Edit', [
    //         'post' => $post,
    //     ]);
    // }

    // public function update(Request $request, Post $post)
    // {
    //     $request->validate([
    //         'title' => ['required', 'max:255'],
    //         'body' => ['required'],
    //     ]);

    //     $post->update($request->all());

    //     return redirect()->route('posts.index');
    // }

    // public function destroy(Post $post)
    // {
    //     $post->delete();

    //     return redirect()->route('posts.index');
    // }
    public function store(Request $request)
    {
        $film = new Film;
        $film->title = $request->title;
        $film->description = $request->description;
        $film->save();

        return response()->json(['message' => 'Film uploaded successfully']);
    }
}
