<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TopicsController as Topics;

Route::get('/topics', [Topics::class, 'index'])->name('topics');
Route::get('/topic/{topic}', [Topics::class, 'show'])->name('topic');

Route::get('/forum/{forum}/topics', [Topics::class, 'index'])->name('forum.topics');
Route::get('/forum/{forum}/topic/{topic}', [Topics::class, 'show'])->name('forum.topic');
