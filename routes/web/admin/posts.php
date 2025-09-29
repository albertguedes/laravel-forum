<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PostsController as AdminPosts;

Route::prefix('admin')->name('admin')->group(function ()
{
    Route::middleware(['auth', 'admin'])->group(function ()
    {
        Route::get('/posts', [AdminPosts::class, 'index'])->name('.posts');

        Route::get('/post/create', [AdminPosts::class, 'create'])->name('.post.create');
        Route::post('/post', [AdminPosts::class, 'store'])->name('.post.store');

        Route::get('/post/{post}', [AdminPosts::class, 'show'])->name('.post');

        Route::get('/post/{post}/edit', [AdminPosts::class, 'edit'])->name('.post.edit');
        Route::put('/post/{post}', [AdminPosts::class, 'update'])->name('.post.update');

        Route::get('/post/{post}/delete', [AdminPosts::class, 'delete'])->name('.post.delete');
        Route::delete('/post/{post}', [AdminPosts::class, 'destroy'])->name('.post.destroy');
    });
});
