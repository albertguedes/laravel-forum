<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\TopicsController as AdminTopics;

Route::prefix('admin')->name('admin')->group(function () {
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/topics', [AdminTopics::class, 'topics'])->name('.topics');

        Route::get('/topic/create', [AdminTopics::class, 'create'])->name('.topic.create');
        Route::post('/topic', [AdminTopics::class, 'store'])->name('.topic.store');

        Route::get('/topic/{topic}', [AdminTopics::class, 'show'])->name('.topic');

        Route::get('/topic/{topic}/edit', [AdminTopics::class, 'edit'])->name('.topic.edit');
        Route::put('/topic/{topic}', [AdminTopics::class, 'update'])->name('.topic.update');

        Route::get('/topic/{topic}/delete', [AdminTopics::class, 'delete'])->name('.topic.delete');
        Route::delete('/topic/{topic}', [AdminTopics::class, 'destroy'])->name('.topic.destroy');
    });
});
