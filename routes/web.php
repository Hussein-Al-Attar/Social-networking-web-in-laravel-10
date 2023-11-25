<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/home', function () {
//     return view('home.index');
// })->name('home.index');

Route::get('/dashboard', function () {
   return redirect()->route('home.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');
    Route::post('/users/{user}/follow', 'UserController@follow')->name('users.follow');
    Route::get('/user/{id}/followers', [UserController::class, 'showFollowers'])->name('user.followers');
    Route::get('/user/{id}/followed-users', [UserController::class, 'showFollowedUsers'])->name('user.followed-users');

    Route::get('/search/reasult', [SearchController::class, 'show'])->name('search.show');
    Route::get('/search', [SearchController::class, 'index'])->name('search.index');

    Route::post('/like', [LikeController::class, 'like'])->name('like');
    Route::post('/unlike', [LikeController::class, 'unlike'])->name('unlike');
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
Route::get('/tags/{tag}/edit', [TagController::class, 'edit'])->name('tags.edit');
Route::put('/tags/{tag}', [TagController::class, 'update'])->name('tags.update');
Route::delete('/tags/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');

Route::get('/comments/{comment}', [CommentController::class, 'show'])->name('comments.show');

Route::controller(GoogleController::class)->group(function () {

    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');

    Route::get('auth/google/callback', 'handleGoogleCallback');

});
Route::resource('comments', CommentController::class)->only(['store', 'destroy']);
Route::put('/users/{user}/profile-image', [UserController::class, 'updateProfileImage'])->name('users.updateProfileImage');
Route::put('/users/{user}/phone', [UserController::class, 'updatePhone'])->name('users.updatePhone');

require __DIR__ . '/auth.php';
