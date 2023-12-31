<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if($request->has('post')) {
            $post = Post::find($request->post);
            return view('layouts.index-content', compact('post'));
        }

        $posts = Post::paginate(5);
        return view('index', compact('posts'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contacts');
    }

    public function latestPosts()
    {
        $posts = Post::latest()->paginate(5);
        return view('index', compact('posts'));
    }

    public function postShow($id)
    {
        $post = Post::find($id);

        return view('layouts.index-content', compact('post'));
    }

    public function search(Request $request)
    {
        $key = $request->search;
        $posts = Post::where('title', 'Like', '%'.$key.'%')->paginate(5);
        // dd($request->search, $posts);

        return view('index', compact('posts'));
    }
}
