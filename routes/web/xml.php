<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FeedController as Feed;
use App\Http\Controllers\SitemapController as Sitemap;

Route::get('/rss.xml', Feed::class)->name('rss');
Route::get('/sitemap.xml', Sitemap::class)->name('sitemap');
