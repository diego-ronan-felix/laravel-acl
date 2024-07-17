<?php

use App\Http\Controllers\Api\Auth\AuthApiController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\PermissionUserController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;

Route::post('/auth', [AuthApiController::class, 'auth'])->name('auth.login');
Route::post('/logout', [AuthApiController::class, 'logout'])->name('auth.logout')->middleware('auth:sanctum');
Route::get('/me', [AuthApiController::class, 'me'])->name('auth.me')->middleware('auth:sanctum');

Route::middleware(['auth:sanctum', 'acl'])->group(function () {
    Route::post('/users/{user}/permissions-sync', [PermissionUserController::class, 'syncPermissionOfUser'])->name('users.permission.sync');
    Route::get('/users/{user}/permissions', [PermissionUserController::class, 'getPermissionsOfUser'])->name('users.permissions');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{permission}', [UserController::class, 'show'])->name('users.show');
    Route::put('/users/{permission}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{permission}', [UserController::class, 'destroy'])->name('users.delete');

    Route::apiResource('/permissions', PermissionController::class);
});

Route::get('/', fn () => response()->json(['message' => 'OK']));
