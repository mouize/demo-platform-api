<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('signed')
    ->get('/email/verify/{id}/{hash}', [AuthController::class, 'verify'])
    ->name('verification.verify');
