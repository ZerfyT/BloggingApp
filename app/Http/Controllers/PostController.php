<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function viewMyPosts()
    {
        $user = auth()->user();
        $posts = Post::where('user_id', $user->id)->get();

        return view('post.my-posts', compact('posts'));
    }

    public function create()
    {
        return view('post.post-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');
        $post = new Post([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'image' => $imagePath,

        ]);
        $post->save();

        $user = auth()->user();
        $posts = Post::where('user_id', $user->id)->get();

        return redirect()->route('myPosts', ['posts' => $posts]);
    }
}
