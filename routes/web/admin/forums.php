<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ForumsController as AdminForums;

Route::prefix('admin')->name('admin')->group(function ()
{
    Route::middleware(['auth', 'admin'])->group(function ()
    {
        Route::get('/forums', [AdminForums::class, 'index'])->name('.forums');

        Route::get('/forum/create', [AdminForums::class, 'create'])->name('.forum.create');
        Route::post('/forum', [AdminForums::class, 'store'])->name('.forum.store');

        Route::get('/forum/{forum}', [AdminForums::class, 'show'])->name('.forum');

        Route::get('/forum/{forum}/edit', [AdminForums::class, 'edit'])->name('.forum.edit');
        Route::put('/forum/{forum}', [AdminForums::class, 'update'])->name('.forum.update');

        Route::get('/forum/{forum}/delete', [AdminForums::class, 'delete'])->name('.forum.delete');
        Route::delete('/forum/{forum}', [AdminForums::class, 'destroy'])->name('.forum.destroy');
    });
});
