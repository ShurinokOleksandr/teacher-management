<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/schedule/{id}', [ScheduleController::class, 'index']);
Route::post('/register', [AuthController::class, 'teacher_register']);
