<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TopicsController as Topics;

Route::get('/forum/{forum}/topics', [Topics::class, 'index'])->name('forum.topics');

Route::get('/forum/{forum}/topic/create', [Topics::class, 'create'])->name('forum.topic.create');
Route::post('/forum/{forum}/topic', [Topics::class, 'store'])->name('forum.topic.store');

Route::get('/forum/{forum}/topic/{topic}', [Topics::class, 'show'])->name('forum.topic');

Route::get('/forum/{forum}/topic/{topic}/edit', [Topics::class, 'edit'])->name('forum.topic.edit');
Route::put('/forum/{forum}/topic/{topic}', [Topics::class, 'update'])->name('forum.topic.update');

Route::delete('/forum/{forum}/topic/{topic}', [Topics::class, 'destroy'])->name('forum.topic.destroy');
