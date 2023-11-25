<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|array',
        ]);
        if ($request->hasFile('image')) {
            $imageUrl=$request->file('image')->store('images', 'public');
        } else {
            $imageUrl = null;
        }
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->image_url = $imageUrl;
        $user = Auth::user();
        $post->user_id = $user->id;
        $post->save();
        if ($request->filled('tags')) {
            $tagNames = $request->input('tags');
            $tags = [];
            foreach ($tagNames as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $tags[] = $tag;
            }
            $post->tags()->saveMany($tags);
        }
        return redirect()->route('user.index')->with('success', 'Post created successfully.');
    }

    public function show($id)
    {
        $post = Post::with('tags')->findOrFail($id);
        return view('posts.show', compact('post'));
    }
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if($post->image_url){
               if(Storage::disk('public')->exists($post->image_url)){
                Storage::disk('public')->delete($post->image_url);
               }
            }
            $post->image_url = $request->file('image')->store('images','public');
        }

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
