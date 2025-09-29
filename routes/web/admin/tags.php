<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\TagsController as AdminTags;

Route::prefix('admin')->name('admin')->group(function ()
{
    Route::middleware(['auth', 'admin'])->group(function ()
    {
        Route::get('/tags', [AdminTags::class, 'index'])->name('.tags');

        Route::get('/tag/create', [AdminTags::class, 'create'])->name('.tag.create');
        Route::post('/tag', [AdminTags::class, 'store'])->name('.tag.store');

        Route::get('/tag/{tag}', [AdminTags::class, 'show'])->name('.tag');

        Route::get('/tag/{tag}/edit', [AdminTags::class, 'edit'])->name('.tag.edit');
        Route::put('/tag/{tag}', [AdminTags::class, 'update'])->name('.tag.update');

        Route::get('/tag/{tag}/delete', [AdminTags::class, 'delete'])->name('.tag.delete');
        Route::delete('/tag/{tag}', [AdminTags::class, 'destroy'])->name('.tag.destroy');
    });
});
