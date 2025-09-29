<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController as Contact;

Route::get('/contact', [Contact::class, 'index'])->name('contact');
Route::post('/contact', [Contact::class, 'sendmessage'])->name('sendmessage');
