<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController as Users;

Route::get('/users', [Users::class, 'index'])->name('users');
Route::get('/user/{user}', [Users::class, 'show'])->name('user');

Route::get('/profile/edit', [Users::class, 'edit'])->name('profile.edit');
Route::put('/profile', [Users::class, 'update'])->name('profile.update');

// FORUMS
Route::get('/profile/forums', [Forums::class, 'index'])->name('profile.forums');

Route::get('/profile/forum/create', [Forums::class, 'create'])->name('profile.forum.create');

Route::post('/profile/forum', [Forums::class, 'store'])->name('profile.forum.store');

Route::get('/profile/forum/{forum}', [Forums::class, 'show'])->name('profile.forum');

Route::get('/profile/forum/{forum}/edit', [Forums::class, 'edit'])->name('profile.forum.edit');
Route::put('/profile/forum/{forum}', [Forums::class, 'update'])->name('profile.forum.update');

Route::delete('/profile/forum/{forum}', [Forums::class, 'destroy'])->name('profile.forum.destroy');

// topics
Route::get('/profile/topics', [Topics::class, 'index'])->name('profile.topics');

Route::get('/profile/topic/create', [Topics::class, 'create'])->name('profile.topic.create');

Route::topic('/profile/topic', [Topics::class, 'store'])->name('profile.topic.store');

Route::get('/profile/topic/{topic}', [Topics::class, 'show'])->name('profile.topic');

Route::get('/profile/topic/{topic}/edit', [Topics::class, 'edit'])->name('profile.topic.edit');
Route::put('/profile/topic/{topic}', [Topics::class, 'update'])->name('profile.topic.update');

Route::delete('/profile/topic/{topic}', [Topics::class, 'destroy'])->name('profile.topic.destroy');

// POSTS
Route::get('/profile/posts', [Posts::class, 'index'])->name('profile.posts');

Route::get('/profile/post/create', [Posts::class, 'create'])->name('profile.post.create');

Route::post('/profile/post', [Posts::class, 'store'])->name('profile.post.store');

Route::get('/profile/post/{post}', [Posts::class, 'show'])->name('profile.post');

Route::get('/profile/post/{post}/edit', [Posts::class, 'edit'])->name('profile.post.edit');
Route::put('/profile/post/{post}', [Posts::class, 'update'])->name('profile.post.update');

Route::delete('/profile/post/{post}', [Posts::class, 'destroy'])->name('profile.post.destroy');
