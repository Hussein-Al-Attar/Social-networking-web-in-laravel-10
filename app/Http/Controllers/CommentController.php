<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $data = $request->validate([
            'body' => 'required',
            'post_id' => 'required|exists:posts,id',
        ]);
        $comment = new Comment();
        $comment->body = $data['body'];
        $comment->post_id = $data['post_id'];
        $comment->user_id = auth()->id();
        $comment->save();
        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        $comments = $post->comments()->with('user')->get();
        return view('comments.show',['comments'=>$comments]);
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
