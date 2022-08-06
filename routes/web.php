<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apicontroller;

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
//Tim
Route::get('tim', [apicontroller::class,'get_all_tim']);
Route::post('tim/insert', [apicontroller::class,'insert_data_tim']);
Route::put('tim/update/{id}', [apicontroller::class,'update_data_tim']);
Route::delete('tim/delete/{id}', [apicontroller::class,'delete_data_tim']);
Route::get('tim/restore/{id}', [apicontroller::class,'restore_data_tim']);
//Pemain
Route::get('pemain', [apicontroller::class,'get_all_pemain']);
Route::get('pemain/{tim_detail_id}', [apicontroller::class,'get_pemain']);
Route::post('pemain/insert', [apicontroller::class,'insert_data_pemain']);
Route::put('pemain/update/{id}', [apicontroller::class,'update_data_pemain']);
Route::delete('pemain/delete/{id}', [apicontroller::class,'delete_data_pemain']);
Route::get('pemain/restore/{id}', [apicontroller::class,'restore_data_pemain']);
//Pertandingan
Route::get('pertandingan', [apicontroller::class,'get_all_pertandingan']);
Route::post('pertandingan/insert', [apicontroller::class,'insert_data_pertandingan']);
//Pertandingan Detail
Route::get('pertandinganDetail', [apicontroller::class,'get_all_pertandingan_detail']);
Route::post('pertandinganDetail/insert', [apicontroller::class,'insert_pertandingan_detail']);
//Hasil Pertandingan
Route::get('hasilPertandingan/{id}', [apicontroller::class,'get_hasil_pertandingan']);
Route::get('hasilPertandingan/update/{pertandingan_id}', [apicontroller::class,'update_hasil_pertandingan']);