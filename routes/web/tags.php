<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TagsController as Tags;

Route::get('/tags', [Tags::class, 'index'])->name('tags');
Route::get('/tag/{tag}', [Tags::class, 'show'])->name('tag');
