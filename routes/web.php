<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------+------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(LandingController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/shop', 'shop')->name('shop');
    Route::get('/shop/{id}/detailproduk','kshop')->name('kshop');
    Route::get('/dashboard', 'dashboard')->name('dashboard')->middleware(['auth','login']);;
    Route::get('/profile/{id}', 'profil')->name('profil')->middleware(['auth','login']);;
    Route::post('/profile/{id}', 'editProfil')->name('editProfil')->middleware(['auth','login']);;
    Route::post('/profile/{id}/gantipw', 'gantiPassword')->name('gantiPassword')->middleware(['auth','login']);;
    Route::get('/admin', 'dataAdmin')->name('dataAdmin')->middleware(['auth','login']);;
    Route::get('/user', 'dataUser')->name('dataUser')->middleware(['auth','login']);;
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/admin/{id}/edit','edit_aView')->name('edit_aView')->middleware(['auth','login']);;
    Route::post('/admin/{id}/edit','editAdmin')->name('editAdmin')->middleware(['auth','login']);;
    Route::get('/destroy/{id}/edit','destroy')->name('destroy')->middleware(['auth','login']);;
    Route::get('/admin/tambah','tambahAdmin')->name('tambahAdmin')->middleware(['auth','login']);;
    Route::post('aksitambah','aksitambah')->name('aksitambah')->middleware(['auth','login']);;
    Route::get('/profileuser/{id}', 'profilU')->name('profilU');
    Route::post('/profileuser/{id}', 'editProfilU')->name('editProfilU');
    Route::post('/profileuser/{id}/gantipw', 'gantiPasswordU')->name('gantiPasswordU');
});

Route::controller(loginController::class)->group(function() {
    Route::get('index', 'login')->name('login');
    Route::post('aksilogin', 'aksilogin')->name('loginaksi');
    Route::get('register','register') ->name('register');
    Route::post('aksiregister','aksiregister') ->name('aksiregister');
});

Route::resource('kategori', KategoriController::class);
Route::resource('produk', ProdukController::class);

