<?php

use App\Http\Controllers\Api\Auth\AuthApiController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;

Route::post('/auth', [AuthApiController::class, 'auth'])->name('auth.login');
Route::post('/logout', [AuthApiController::class, 'logout'])->name('auth.logout')->middleware('auth:sanctum');
Route::post('/me', [AuthApiController::class, 'me'])->name('auth.me')->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{permission}', [UserController::class, 'show'])->name('users.show');
    Route::put('/users/{permission}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{permission}', [UserController::class, 'destroy'])->name('users.delete');

    Route::apiResource('/permissions', PermissionController::class);
});

Route::get('/', fn () => response()->json(['message' => 'OK']));
