<?php

use App\Http\Controllers\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/lyrics/{filename}', [VideoController::class, 'getLyrics']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
