<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin','middleware'=>['auth']], function (){
    Route::resource('provinsi', ProvinsiController::class);
});

Route::group(['prefix' => 'admin','middleware'=>['auth']], function (){
    Route::resource('kota', KotaController::class);
});

Route::group(['prefix' => 'admin','middleware'=>['auth']], function (){
    Route::resource('kecamatan', KecamatanController::class);
});

Route::group(['prefix' => 'admin','middleware'=>['auth']], function (){
    Route::resource('kelurahan', KelurahanController::class);
});

Route::group(['prefix' => 'admin','middleware'=>['auth']], function (){
    Route::resource('rw', RwController::class);
});

Route::group(['prefix' => 'admin','middleware'=>['auth']], function (){
    Route::resource('tracking', TrackingController::class);
});

Route::resource('frontend',FrontendController::class);
Route::resource('frontend/kontak',FrontendController::class);

// Route::get('/kontak', function () {
//     return view('admin.frontend.index');
// });


// Route::get('/hello', function () {
//     return ('welcome to the hell');
// });

// Route::get('/dashboard', function () {
//     return view('layouts.master');
// });

// Route::get('/provinsi', function () {
//     return view('admin.provinsi.index');
// });

// Route::get('/kota', function () {
//     return view('admin.kota.index');
// });

// Route::get('/kecamatan', function () {
//     return view('admin.kecamatan.index');
// });

// Route::get('/kelurahan', function () {
//     return view('admin.kelurahan.index');
// });

// Route::get('/rw', function () {
//     return view('admin.rw.index');
// });