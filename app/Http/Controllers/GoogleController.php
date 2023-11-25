<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()
            ->redirect();
    }

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function handleGoogleCallback()
    {
        try {
            // Get user data from Google
            $user = Socialite::driver('google')->stateless()->user();

            // Check if the user already exists in your application
            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {
                // If user exists, log in the user
                Auth::login($finduser);
                return redirect()->intended('home');
            } else {
                // If user doesn't exist, create a new user
                $newUser = User::updateOrCreate(['email' => $user->email], [
                    'name' => $user->name,
                    'google_id' => $user->id,
                    'image_url_google' => $user->avatar,
                    'password' => encrypt('123456dummy'), // Set a default password for the new user
                ]);

                Auth::login($newUser);
                //Auth::user()->profile_image_path
                return redirect()->intended('home');
            }
        } catch (Exception $e) {
            dd($e->getMessage()); // Display any exceptions that occurred
        }
    }

}
