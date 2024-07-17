<?php

use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{permission}', [UserController::class, 'show'])->name('users.show');
Route::put('/users/{permission}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{permission}', [UserController::class, 'destroy'])->name('users.delete');

Route::apiResource('/permissions', PermissionController::class);

Route::get('/', fn () => response()->json(['message' => 'OK']));
