<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoriesController as AdminCategories;

Route::prefix('admin')->name('admin')->group(function ()
{
    Route::middleware(['auth', 'admin'])->group(function ()
    {
        Route::get('/categories', [AdminCategories::class, 'index'])->name('.categories');

        Route::get('/category/create', [AdminCategories::class, 'create'])->name('.category.create');
        Route::post('/category', [AdminCategories::class, 'store'])->name('.category.store');

        Route::get('/category/{category}', [AdminCategories::class, 'show'])->name('.category');

        Route::get('/category/{category}/edit', [AdminCategories::class, 'edit'])->name('.category.edit');
        Route::put('/category/{category}', [AdminCategories::class, 'update'])->name('.category.update');

        Route::get('/category/{category}/delete', [AdminCategories::class, 'delete'])->name('.category.delete');
        Route::delete('/category/{category}', [AdminCategories::class, 'destroy'])->name('.category.destroy');
    });
});
