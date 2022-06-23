<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});
Route::get('/index', function () {
    return view('index');
});
// Hunian 
Route::get('/hunian', function () {
    return view('pages/hunian');
});
// Perumahan
Route::get('/perumahan', function () {
    return view('pages/perumahan');
});
// Rutilahu -----------------------
Route::get('/usulan', function () {
    return view('pages/rutilahu/usulan');
});
Route::get('/daftartunggu', function () {
    return view('pages/rutilahu/daftartunggu');
});

// Layanan -----------------------
Route::get('/penerimabantuan', function () {
    return view('pages/layanan/penerimabantuan');
});
Route::get('/hasilpelaksanaan', function () {
    return view('pages/layanan/hasilpelaksanaan');
});
Route::get('/perekaman', function () {
    return view('pages/layanan/perekaman');
});
Route::get('/psu', function () {
    return view('pages/layanan/psu');
});

// Map
Route::get('/map-desa', function () {
    return view('pages/map/desa');
});
Route::get('/map-kecamatan', function () {
    return view('pages/map/kecamatan');
});

Route::get('/rawan-bencana', function () {
    return view('pages/rawan-bencana');
});
Route::get('/kawasan-kumuh', function () {
    return view('pages/kawasan-kumuh');
});
Route::get('/backlog', function () {
    return view('pages/backlog');
});
Route::get('/pengelolaan-user', function () {
    return view('pages/pengelolaan-user');
});

// logout 
Route::get('/login', function () {
    return view('/login');
});
// lupa-password 
Route::get('/lupa-password', function () {
    return view('/lupa-password');
});

Route::get('/form-elements', function () {
    return view('pages/form-elements');
});

// create 
Route::get('/hunian-create', function () {
    return view('pages/hunian-create');
});
Route::get('/perumahan-create', function () {
    return view('pages/perumahan-create');
});
Route::get('/backlog-create', function () {
    return view('pages/backlog-create');
});
Route::get('/kawasan-kumuh-create', function () {
    return view('pages/kawasan-kumuh-create');
});
Route::get('/rawan-bencana-create', function () {
    return view('pages/rawan-bencana-create');
});
Route::get('/pengelolaan-user-create', function () {
    return view('pages/pengelolaan-user-create');
});
Route::get('/perekaman-create', function () {
    return view('pages/layanan/perekaman-create');
});
Route::get('/psu-create', function () {
    return view('pages/layanan/psu-create');
});