<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\LetterRequestController;
use App\Http\Controllers\Api\ComplaintController;
use App\Http\Controllers\Api\NotificationController;

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

    Route::get('/complaints', [
        ComplaintController::class,
        'index'
    ]);

    Route::get('/complaints/{complaint}', [
        ComplaintController::class,
        'show'
    ]);

    Route::post('/complaints', [
        ComplaintController::class,
        'store'
    ]);

    Route::get('/notifications', [
        NotificationController::class,
        'index'
    ]);

    Route::post('/notifications/{notification}/read', [
        NotificationController::class,
        'read'
    ]);

    Route::post('/notifications/read-all', [
        NotificationController::class,
        'readAll'
    ]);

    Route::post('/logout', [
        AuthController::class,
        'logout'
    ]);
});