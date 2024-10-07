<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, "index"])->name('login');
    Route::post('/', [LoginController::class, "login"]);
});
Route::get('/home', function(){
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [UserController::class, 'index'])->middleware('UserAkses:admin');
    Route::get('/admin/user', [UserController::class, 'user'])->middleware('UserAkses:user');
    Route::get('/logout', [LoginController::class, 'logout']);
});