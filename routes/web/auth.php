<?php declare(strict_types=1);

use App\Http\Controllers\AuthController as Auth;

Route::redirect('/', '/auth/login');

Route::prefix('auth')->name('auth')->group(function ()
{
    Route::get('/login', [Auth::class, 'login'])->name('.login');
    Route::post('/login', [Auth::class, 'authenticate'])->name('.authenticate');

    Route::get('/register', [Auth::class, 'register'])->name('.register');
    Route::post('/register', [Auth::class, 'store'])->name('.store');

    Route::get('/reset', [Auth::class, 'reset'])->name('.reset');
    Route::post('/reset', [Auth::class, 'sendResetLink'])->name('.sendResetLink');

    Route::post('/logout', [Auth::class, 'logout'])->name('.logout');
});
