<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ForumsController as Forums;

Route::get('/forums', [Forums::class, 'index'])->name('forums');
Route::get('/forum/{forum}', [Forums::class, 'show'])->name('forum');
