<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostsController as Posts;

Route::get('/posts', [Posts::class, 'index'])->name('posts');
Route::get('/post/{post}', [Posts::class, 'show'])->name('post');

Route::get('/post/{post}/create', [Posts::class, 'create'])->name('post.create');
Route::post('/post/{post}', [Posts::class, 'store'])->name('post.store');

Route::get('/post/{post}/edit', [Posts::class, 'edit'])->name('post.edit');
Route::put('/post/{post}', [Posts::class, 'update'])->name('post.update');

Route::delete('/post/{post}', [Posts::class, 'destroy'])->name('post.destroy');

Route::get('/forum/{forum}/topic/{topic}/posts', [Posts::class, 'index'])->name('forum.topic.posts');
Route::get('/forum/{forum}/topic/{topic}/post/{post}', [Posts::class, 'show'])->name('forum.topic.post');
