<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UsersController as AdminUsers;

Route::prefix('admin')->name('admin')->group(function ()
{
    Route::middleware(['auth', 'admin'])->group(function ()
    {
        Route::get('users', [AdminUsers::class, 'index'])->name('.users');
        Route::get('user', [AdminUsers::class, 'show'])->name('.user');

        Route::get('user/create', [AdminUsers::class, 'create'])->name('.user.create');
        Route::post('user', [AdminUsers::class, 'store'])->name('.user.store');

        Route::get('user/edit', [AdminUsers::class, 'edit'])->name('.user.edit');
        Route::put('user', [AdminUsers::class, 'update'])->name('.user.update');

        Route::get('user.delete', [AdminUsers::class, 'delete'])->name('.user.delete');
        Route::delete('user', [AdminUsers::class, 'destroy'])->name('.user.destroy');
    });
});
