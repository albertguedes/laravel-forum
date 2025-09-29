<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostsController as Posts;

Route::get('/forum/{forum}/topic/{topic}/posts', [Posts::class, 'index'])->name('posts');
Route::get('/forum/{forum}/topic/{topic}/post/{post}', [Posts::class, 'show'])->name('post');
