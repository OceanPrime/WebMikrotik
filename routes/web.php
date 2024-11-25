<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\hargaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PPPoEController;
use App\Http\Controllers\promoController;
use App\Http\Controllers\HotspotController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\waGateawayController;
use App\Http\Controllers\ManajemenUserController;

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
});

Route::get('/', [LoginController::class, "index"])->name('login');
Route::post('/', [LoginController::class, "login"])->name('login');

Route::get('/home', function(){
    return redirect('/admin');
});

// Route::middleware(['auth'])->group(function () {
    
// });
Route::group(['middleware' => 'auth:mikrotik'], function () {
    Route::get('/admin', [DashboardController::class, 'index'])->middleware('auth:mikrotik');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/server', [PPPoEController::class, 'index'])->name('server.index');
Route::get('/admin/server/create', [PPPoEController::class, 'createServer'])->name('server.tambah');
Route::get('/admin/server/edit', [PPPoEController::class, 'editServer'])->name('server.edit');

Route::get('/admin/secret', [PPPoEController::class, 'secret'])->name('secret.index');
Route::get('/admin/secret/create', [PPPoEController::class, 'createSecret'])->name('secret.tambah');
Route::post('/admin/secret/create', [PPPoEController::class, 'storeSecret'])->name('secret.storeSecret');
Route::get('/admin/secret/edit/{id}', [PPPoEController::class, 'editSecret'])->name('secret.edit'); 
Route::post('/admin/secret/update/', [PPPoEController::class, 'updateSecret'])->name('secret.update'); 


Route::get('/admin/profil', [PPPoEController::class, 'profil'])->name('profil.index');
Route::get('/admin/profil/create', [PPPoEController::class, 'createProfile'])->name('profil.tambah');
Route::get('/admin/profil/edit', [PPPoEController::class, 'editProfile'])->name('profil.edit');


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

Route::get('/admin/manajemenUser', [ManajemenUserController::class, 'index'])->name('admin.ManajemenUser.index');
Route::get('/admin/manajemenUser/create', [ManajemenUserController::class, 'createUser'])->name('ManajemenUser.tambah');
Route::get('/admin/manajemenUser/{id}/edit', [ManajemenUserController::class, 'editUser'])->name('ManajemenUser.edit');
Route::put('/admin/manajemenUser/{id}', [ManajemenUserController::class, 'updateUser'])->name('ManajemenUser.updateUser');
Route::get('/admin/manajemenUser/{id}', [ManajemenUserController::class, 'destroy'])->name('ManajemenUser.destroy');

Route::get('/admin/promo', [promoController::class, 'index'])->name('promo.index');
Route::get('/admin/promo/create', [promoController::class, 'createPromo'])->name('promo.tambah');
Route::post('/admin/promo/store', [promoController::class, 'store'])->name('promo.store');
Route::get('/admin/promo/{id}/edit', [promoController::class, 'updatePromo'])->name('promo.edit');
Route::put('/admin/promo/{id}', [promoController::class, 'update'])->name('promo.update');
Route::get('/admin/promo/{id}', [promoController::class, 'destroy'])->name('promo.destroy');

Route::get('/admin/harga', [hargaController::class, 'index'])->name('harga.index');
Route::get('/admin/harga/create', [hargaController::class, 'createHarga'])->name('harga.tambah');
Route::post('/admin/harga/store', [hargaController::class, 'store'])->name('harga.store');
Route::get('/admin/harga/{id}/edit', [hargaController::class, 'updateHarga'])->name('harga.edit');
Route::put('/admin/harga/{id}', [hargaController::class, 'update'])->name('harga.update');
Route::get('/admin/harga/{id}', [hargaController::class, 'destroy'])->name('harga.destroy');

Route::get('/admin/ManajemenKeuangan', [KeuanganController::class, 'index'])->name('ManajemenKeuangan.financeReport.index');
Route::get('/admin/ManajemenKeuangan/financeReport', [KeuanganController::class, 'unpaidInvoice'])->name('ManajemenKeuangan.unpaidInvoice.index');

Route::get('/admin/waGateaway', [waGateawayController::class, 'index'])->name('waGateaway.index');

Route::get('/admin/messages', [MessageController::class, 'index'])->name('message.index');
Route::get('/admin/messages/create', [MessageController::class, 'create'])->name('message.create');
Route::post('/admin/messages', [MessageController::class, 'store'])->name('message.store');
Route::get('/admin/messages/{id}/edit', [MessageController::class, 'edit'])->name('message.edit');
Route::put('/admin/messages/{id}', [MessageController::class, 'update'])->name('message.update');
Route::delete('/admin/messages/{id}', [MessageController::class, 'destroy'])->name('message.destroy');
Route::post('/admin/messages/{id}/send', [MessageController::class, 'send'])->name('message.send');

// Route::get('/admin/user', [SessionController::class, 'user'])->middleware('UserAkses:user');
Route::get('/logout', [LoginController::class, 'logout'])->name('Auth.login');





