<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PklController;
use App\Http\Controllers\IndustriController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('gurus', GuruController::class);
Route::apiResource('siswas', SiswaController::class);
Route::apiResource('pkls', PklController::class);
Route::apiResource('industris', IndustriController::class);

