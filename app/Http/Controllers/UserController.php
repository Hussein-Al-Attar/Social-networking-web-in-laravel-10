<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $posts = $user->posts()->with('tags')->get();
        return view('user.show', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('User.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $date = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'image' => 'nullable|max:2048|image|mimes:png,jpg',
            'address' => 'required',
            'discription' => 'required',
        ]);
        $user = Auth::user();
        if ($request->hasFile('image')) {
            // Remove the old image if it exists
            if ($user->profile_photo_path && Storage::disk('public')->exists($user->profile_photo_path)) {
                try {
                    Storage::disk('public')->delete($user->profile_photo_path);
                } catch (Exception $e) {
                    dd($e->getMessage());
                }
            } else {
                //dd('File does not exist.');
            }
            $data['image'] = $request->file('image')->store('images', 'public'); // Store the image in the "public/images" directory
        }
        User::whereId($id)->update(
            ['name' => $request['name'],
                'phone' => $request['phone'],
                'address' => $request['address'],
                'discription' => $request['discription'],
                'profile_photo_path' => $data['image'] ?? $user->image,
            ]);
        return redirect()->route('user.index')->with('success', 'Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function updateProfileImage(Request $request, User $user)
    {
        $data = $request->validate([
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image file
        ]);

        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('images', 'public'); // Store the image in the "public/images" directory
            $user['profile_photo_path'] = $imagePath;
        }

        $user->save();

        return back();
    }
    public function updatePhone(Request $request, User $user)
    {
        $data = $request->validate([
            'phone' => 'required', // Validate the image file
        ]);

        $user['phone'] = $data['phone'];

        $user->save();

        return back();
    }
    public function follow(Request $request, User $user)
    {
        $follower = auth()->user();
        $follower->followings()->attach($user);

        // You can redirect or perform any additional actions after following

        return redirect()->back()->with('success', 'You are now following ' . $user->name);
    }
    public function showFollowers($userId)
    {
        $user = User::findOrFail($userId);
        $followers = $user->followers;

        return view('followers', compact('followers'));
    }

    public function showFollowedUsers($userId)
    {
        $user = User::findOrFail($userId);
        $followedUsers = $user->followedUsers;

        return view('followed_users', compact('followedUsers'));
    }
}
