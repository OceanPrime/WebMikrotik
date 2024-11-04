<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManajemenUserController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/user/login', [UserLoginController::class, 'index'])->name('user.login');
Route::post('/user/login', [UserLoginController::class, 'login']);
Route::post('/user/logout', [UserLoginController::class, 'logout'])->name('user.logout');
Route::post('/user/verify-password', [UserLoginController::class, 'verifyPassword'])->middleware('auth:sanctum');
Route::get('/messages', [MessageController::class, 'apiIndex']);
Route::post('/messages', [MessageController::class, 'apiStore']);
Route::middleware('auth:sanctum')->get('/user/profile', [UserLoginController::class, 'editProfile'])->name('user.profile');
Route::middleware('auth:sanctum')->put('/user/profile', [UserLoginController::class, 'updateProfile'])->name('user.profile.update');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/admin/manajemenUser', [ManajemenUserController::class, 'index'])->name('ManajemenUser.index');
Route::post('/admin/manajemenUser', [ManajemenUserController::class, 'store'])->name('ManajemenUser.store');