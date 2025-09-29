<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;

Route::prefix('admin')->name('admin')->group(function ()
{
    Route::middleware('auth')->group(function ()
    {
        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('.dashboard');
    });
});
