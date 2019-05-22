<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('article', 'ArticleController');

Route::get('/pegawai', 'PegawaiController@index');
Route::post('/pegawai/create', 'PegawaiController@create');
Route::get('/pegawai/{id}/edit', 'PegawaiController@edit');
Route::post('/pegawai/{id}/update', 'PegawaiController@update');
Route::get('/pegawai/{id}/destroy', 'PegawaiController@destroy');
Route::get('/pegawai/find','PegawaiController@find');
Route::get('/pegawai/cari', 'PegawaiController@cari');
Route::get('/pegawai/export_excel', 'PegawaiController@export_excel');


Route::get('/absensi', 'AbsenController@index');
Route::get('/absensi/cari', 'AbsenController@cari');
Route::get('/absensi/hadir/{id}', 'AbsenController@hadir');
Route::get('/absensi/keluar/{id}', 'AbsenController@keluar');
Route::get('/absensi/besok/{nama}/{jabatan}', 'AbsenController@besok');
