<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController as Profile;
use App\Http\Controllers\UsersController as Users;

Route::get('/users', [Users::class, 'index'])->name('users');
Route::get('/user/{user}', [Users::class, 'show'])->name('user');

// Profile
Route::get('/profile', [Profile::class, 'index'])->name('profile');

Route::get('/profile/edit', [Profile::class, 'edit'])->name('profile.edit');
Route::put('/profile', [Profile::class, 'update'])->name('profile.update');

Route::get('/profile/password', [Profile::class, 'password'])->name('profile.password');
Route::put('/profile/password', [Profile::class, 'passwordUpdate'])->name('profile.password.update');

Route::get('/profile/delete', [Profile::class, 'delete'])->name('profile.delete');
Route::delete('/profile', [Profile::class, 'destroy'])->name('profile.destroy');
