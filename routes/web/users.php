<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController as Users;

Route::get('/users', [Users::class, 'index'])->name('users');
Route::get('/user/{user}', [Users::class, 'show'])->name('user');
