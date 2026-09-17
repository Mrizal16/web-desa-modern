<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\LetterRequestController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', [AuthController::class, 'user']);

    Route::get('/dashboard', [
        DashboardController::class,
        'index'
    ]);

    Route::get('/letter-types', [
        LetterRequestController::class,
        'types'
    ]);

    Route::get('/letters', [
        LetterRequestController::class,
        'index'
    ]);

    Route::get('/letters/{letterRequest}', [
        LetterRequestController::class,
        'show'
    ]);

    Route::post('/letters', [
        LetterRequestController::class,
        'store'
    ]);

    Route::post('/letters/{letterRequest}/revision', [
        LetterRequestController::class,
        'updateRevision'
    ]);

    Route::post('/logout', [
        AuthController::class,
        'logout'
    ]);
});