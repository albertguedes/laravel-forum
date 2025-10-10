<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ForumsController as Forums;
use App\Http\Controllers\PostsController as Posts;
use App\Http\Controllers\TopicsController as Topics;
use App\Http\Controllers\UsersController as Users;

Route::get('/users', [Users::class, 'index'])->name('users');
Route::get('/user/{user}', [Users::class, 'show'])->name('user');

Route::get('/profile/edit', [Users::class, 'edit'])->name('profile.edit');
Route::put('/profile', [Users::class, 'update'])->name('profile.update');
