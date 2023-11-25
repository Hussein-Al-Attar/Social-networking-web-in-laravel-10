<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $postId = $request->input('post_id');
        $user = Auth::user();

        $like = Like::firstOrCreate([
            'user_id' => $user->id,
            'post_id' => $postId,
        ]);

        return response()->json(['success' => true]);
    }

    public function unlike(Request $request)
    {
        $postId = $request->input('post_id');
        $user = Auth::user();

        Like::where([
            'user_id' => $user->id,
            'post_id' => $postId,
        ])->delete();

        return response()->json(['success' => true]);
    }
}
