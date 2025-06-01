<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlaylistController;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/playlists', [PlaylistController::class, 'getUserPlaylists']);
