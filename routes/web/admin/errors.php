<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin')->group(function ()
{
    Route::middleware('auth')->group(function ()
    {
        Route::get('/404', function () {
            return view('admin.errors.404');
        })->name('.errors.404');

        Route::get('/500', function () {
            return view('admin.errors.500');
        })->name('.errors.500');

        Route::get('/503', function () {
            return view('admin.errors.503');
        })->name('.errors.503');
    });
});
