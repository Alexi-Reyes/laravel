<?php

use App\Http\Middleware\ApiKeyMiddleware;
use App\Http\Controllers\ApiKeyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\TrackController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('home', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

Route::get('test', [HomeController::class, 'index'])->name('test');

Route::prefix('/')->name('tracks.')->group(function () {
    Route::get('/', [TrackController::class, 'index'])->name('index');

    Route::middleware(['auth', IsAdmin::class])->group(function () {
        Route::get('create', [TrackController::class, 'create'])->name('create');
        Route::post('/', [TrackController::class, 'store'])->name('store');
        Route::get('{track}/edit', [TrackController::class, 'edit'])->name('edit');
        Route::put('{track}', [TrackController::class, 'update'])->name('update');
        Route::delete('{track}', [TrackController::class, 'destroy'])->name('destroy');
    });
});

Route::prefix('/playlists')->name('playlists.')->group(function () {
    Route::get('/', [PlaylistController::class, 'index'])->name('index');

    Route::middleware(['auth', IsAdmin::class])->group(function () {
        Route::get('create', [PlaylistController::class, 'create'])->name('create');
        Route::post('/', [PlaylistController::class, 'store'])->name('store');
        Route::get('{playlist}', [PlaylistController::class, 'show'])->name('show');
        Route::get('{playlist}/edit', [PlaylistController::class, 'edit'])->name('edit');
        Route::put('{playlist}', [PlaylistController::class, 'update'])->name('update');
        Route::delete('{playlist}', [PlaylistController::class, 'destroy'])->name('destroy');
    });
});

Route::prefix('/apiKeys')->name('apiKeys.')->group(function () {
    Route::middleware(['auth', IsAdmin::class])->group(function () {
        Route::get('/', [ApiKeyController::class, 'index'])->name('index');
        Route::get('create', [ApiKeyController::class, 'create'])->name('create');
        Route::post('/', [ApiKeyController::class, 'store'])->name('store');
        Route::delete('{apiKey}', [ApiKeyController::class, 'destroy'])->name('destroy');
    });
});
