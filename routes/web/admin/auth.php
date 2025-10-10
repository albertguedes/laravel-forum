<?php declare(strict_types=1);

use App\Http\Controllers\Admin\AuthController as AdminAuth;

Route::prefix('auth')->name('auth')->group(function ()
{
    Route::redirect('/', '/login');

    Route::get('/login', [AdminAuth::class, 'index'])->name('.login');
    Route::post('/login', [AdminAuth::class, 'authenticate'])->name('.authenticate');

    Route::get('/register', [AdminAuth::class, 'register'])->name('.register');
    Route::post('/register', [AdminAuth::class, 'store'])->name('.store');

    Route::get('/reset', [AdminAuth::class, 'reset'])->name('.reset');
    Route::post('/reset', [AdminAuth::class, 'sendResetLink'])->name('.sendResetLink');

    Route::post('/logout', [AdminAuth::class, 'logout'])->name('.logout');
});
