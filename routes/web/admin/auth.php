<?php declare(strict_types=1);

use App\Http\Controllers\Admin\AuthController as AdminAuth;

Route::prefix('admin')->name('admin')->group(function ()
{
    Route::redirect('/', '/login');

    Route::get('/login', [AdminAuth::class, 'index'])->name('.auth.login');
    Route::post('/login', [AdminAuth::class, 'authenticate'])->name('.auth.authenticate');

    Route::get('/register', [AdminAuth::class, 'register'])->name('auth.register');
    Route::post('/register', [AdminAuth::class, 'store'])->name('.auth.store');

    Route::get('/reset', [AdminAuth::class, 'reset'])->name('.auth.reset');
    Route::post('/reset', [AdminAuth::class, 'sendResetLink'])->name('.auth.sendResetLink');

    Route::post('/logout', [AdminAuth::class, 'logout'])->name('.auth.logout');
});
