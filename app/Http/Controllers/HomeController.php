<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $tags = Tag::with('posts')->take(10)->get();
        $posts=Post::all()->take(10);

        return view('home.index',compact('tags','posts'));
    }
}
