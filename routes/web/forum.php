<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ForumsController as Forums;

Route::get('/forums', [Forums::class, 'index'])->name('forums');

Route::get('/forum/create', [Forums::class, 'create'])->name('forum.create');
Route::post('/forum', [Forums::class, 'store'])->name('forum.store');

Route::get('/forum/{forum}', [Forums::class, 'show'])->name('forum');

Route::get('/forum/{forum}/edit', [Forums::class, 'edit'])->name('forum.edit');
Route::put('/forum/{forum}', [Forums::class, 'update'])->name('forum.update');

Route::delete('/forum/{forum}', [Forums::class, 'destroy'])->name('forum.destroy');
