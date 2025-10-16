<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostsController as Posts;

Route::get('/forum/{forum}/topic/{topic}/posts', [Posts::class, 'index'])->name('forum.topic.posts');

Route::get('/forum/{forum}/topic/{topic}/post/create', [Posts::class, 'create'])->name('forum.topic.post.create');
Route::post('/forum/{forum}/topic/{topic}/post', [Posts::class, 'store'])->name('post.store');

Route::get('/forum/{forum}/topic/{topic}/post/{post}', [Posts::class, 'show'])->name('forum.topic.post');

Route::get('/forum/{forum}/topic/{topic}/post/{post}/edit', [Posts::class, 'edit'])->name('forum.topic.post.edit');
Route::put('/forum/{forum}/topic/{topic}/post/{post}', [Posts::class, 'update'])->name('forum.topic.post.update');

Route::delete('/forum/{forum}/topic/{topic}/post/{post}', [Posts::class, 'destroy'])->name('forum.topic.post.destroy');

