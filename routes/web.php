<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PodcastEpisodeController;
use App\Http\Controllers\PublishedPodcastController;
use App\Http\Controllers\PodcastCoverImageController;

Route::get('/', function () {
    return redirect()->route('podcasts.index');
});

Route::resource('podcasts', PodcastController::class)->only(['index', 'show', 'edit', 'update']);

Route::resource('episodes', EpisodeController::class)->only(['index', 'show']);

Route::resource('podcasts.episodes', PodcastEpisodeController::class)->shallow()->only(['index']);

Route::put('podcasts/{podcast}/cover-image', [PodcastCoverImageController::class, 'update'])
    ->name('podcasts.cover-image.update');

Route::resource('subscriptions', SubscriptionController::class)->only(['store', 'destroy']);

Route::resource('published-podcasts', PublishedPodcastController::class)->only(['store', 'destroy']);

// ADMIN ROUTES
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
