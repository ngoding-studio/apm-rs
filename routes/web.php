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


Route::get('/','\App\Http\Controllers\CPage@menu');
Route::get('apm-offline','\App\Http\Controllers\CPage@offline');
Route::get('apm-offline-daftar','\App\Http\Controllers\CApm@offlinedaftar');
Route::get('apm-online','\App\Http\Controllers\CPage@online');
Route::get('apm-online-daftar','\App\Http\Controllers\CApm@onlinedaftar');
Route::get('apm-online','\App\Http\Controllers\CPage@online');
Route::get('apm-bukti','\App\Http\Controllers\CPage@bukti');
Route::get('apm-bukti-masuk','\App\Http\Controllers\CApm@masuk');

Route::group(['middleware'=> 'ApmSession'], function(){
    Route::get('home','\App\Http\Controllers\CPage@home');
    Route::get('apm-list-dokter','\App\Http\Controllers\CApm@listDokter');
    Route::get('apm-logout','\App\Http\Controllers\CApm@logout');
    Route::get('apm-offline-regis','\App\Http\Controllers\CApm@offlineregis');
    Route::get('apm-offline-update','\App\Http\Controllers\CApm@update');
    Route::get('apm-update','\App\Http\Controllers\CPage@update');
    Route::get('apm-online-konfirmasi','\App\Http\Controllers\CPage@konfirmasi');
    Route::get('apm-online-regis','\App\Http\Controllers\CApm@onlineregis');
    Route::get('apm-bukti-verifikasi','\App\Http\Controllers\CPage@verifikasi');
    Route::get('apm-bukti-verifikasi-cetak','\App\Http\Controllers\CApm@verifikasicetak');
    Route::get('apm-cetak','\App\Http\Controllers\CApm@cetak');

});
