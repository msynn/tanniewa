<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Route;

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



Route::get('/', function () {
    return view(view: 'front');
});

Route::get('/aplikasi/{id}', [AppController::class, 'show'])->name('newApp.show');


Route::get('/karir', function () {
    return view(view: 'karir');
});

Route::get('/pemesanan', function () {
    return view(view: 'pemesanan');
});

Route::post('/pesanan/store', [PesananController::class, 'store'])->name('pesanan.store');



Route::get('/about', function () {
    return view(view: 'about');
});

Route::get('/loginGuest', action: function () {
    return view(view: 'loginGuest');
});
