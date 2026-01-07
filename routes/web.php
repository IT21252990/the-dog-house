<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DogController;


Route::get('/', [DogController::class, 'index']);
Route::post('/favorite', [DogController::class, 'store']);
Route::get('/favorites', [DogController::class, 'favorites']);
Route::delete('/favorite/{favoriteDog}', [DogController::class, 'destroy']);
