<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PPPoEController;
use App\Http\Controllers\HotspotController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DashboardController;

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
    Route::get('/admin', [DashboardController::class, 'index'])->middleware('UserAkses:admin');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


    Route::get('/admin/server', [PPPoEController::class, 'index'])->name('server.index');
    Route::get('/admin/server/create', [PPPoEController::class, 'createServer'])->name('server.tambah');

    Route::get('/admin/secret', [PPPoEController::class, 'secret'])->name('secret.index');
    Route::get('/admin/secret/create', [PPPoEController::class, 'createSecret'])->name('secret.tambah');

    Route::get('/admin/profil', [PPPoEController::class, 'profil'])->name('profil.index');
    Route::get('/admin/profil/create', [PPPoEController::class, 'createProfile'])->name('profil.tambah');


    Route::get('/admin/activeConnection', [PPPoEController::class, 'aktifKoneksi'])->name('aktifKoneksi.index');

    Route::get('/admin/activeConnectionHotspot', [HotspotController::class, 'aktifKoneksi'])->name('aktifKoneksiHotspot.index');
    Route::get('/admin/serverHotspot', [HotspotController::class, 'index'])->name('serverHotspot.index');
    Route::get('/admin/serverHotspot/tambah', [HotspotController::class, 'create'])->name('serverHotspot.tambah');


    Route::get('/admin/serverProfile', [HotspotController::class, 'serverProfil'])->name('serverProfil.index');
    Route::get('/admin/serverProfile/tambah', [HotspotController::class, 'createServerProfil'])->name('serverProfil.tambah');


    Route::get('/admin/userSecret', [HotspotController::class, 'secretUser'])->name('secretUser.index');
    Route::get('/admin/userSecret/tambah', [HotspotController::class, 'createSecretUser'])->name('secretUser.tambah');


    Route::get('/admin/profileUser', [HotspotController::class, 'profilUser'])->name('profilUser.index');
    Route::get('/admin/profileUser/tambah', [HotspotController::class, 'createProfilUser'])->name('profilUser.tambah');


    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware('UserAkses:admin');
    Route::get('/admin/user', [SessionController::class, 'user'])->middleware('UserAkses:user');
    Route::get('/logout', [LoginController::class, 'logout']);
});






