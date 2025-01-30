<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SecondTestController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/contact', [ContactController::class, 'store']);
Route::get('/listMessage', [ContactController::class, 'index']);

Route::post('/created', [SecondTestController::class, 'store']);
Route::get('/show', [SecondTestController::class, 'index']);
Route::delete('/delete/{id}', [SecondTestController::class, 'destroy']);
Route::put('/modif/{id}', [SecondTestController::class, 'update']);

