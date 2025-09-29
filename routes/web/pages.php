<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController as Index;

Route::get('/archive', [Index::class, 'archive'])->name('archive');
Route::get('/about', [Index::class, 'about'])->name('about');
Route::get('/', [Index::class, 'index'])->name('home');
