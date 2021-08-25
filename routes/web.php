<?php

//Route Halaman Utama
Route::get('/', 'Home@index');

//Route Halaman registrasi
Route::get('/registrasi', 'Registrasi@index');

//Route simpan data registrasi
Route::post('/daftar','Registrasi@daftar');

//Route login dan Logout Suplier
Route::get('/masukSuplier', 'Suplier@index');
Route::post('/masukSuplier','Suplier@masukSuplier');
Route::get('/keluarSuplier','Suplier@keluarSuplier');
Route::get('/listSuplier','Pengadaan@listSuplier');
Route::post('/tambahPengajuan','Pengajuan@tambahPengajuan');
Route::get('/terimaPengajuan/{id}','Pengajuan@terimaPengajuan');
Route::get('/tolakPengajuan/{id}','Pengajuan@tolakPengajuan');
Route::get('/riwayatku','Pengajuan@riwayatku');
Route::post('/tambahLaporan','Pengajuan@tambahLaporan');
Route::get('/laporan','Pengajuan@laporan');
Route::get('/selesaiPengajuan/{id}','Pengajuan@selesaiPengajuan');
Route::get('/pengajuanselesai','Pengajuan@pengajuanselesai');
Route::get('/tolakLaporan/{id}','Pengajuan@tolakLaporan');
Route::get('/listSup','Suplier@listSup');
Route::get('/nonAktif/{id}','Suplier@nonAktif');
Route::get('/Aktif/{id}','Suplier@Aktif');
Route::post('/ubahPasswordSup','Suplier@ubahPassword');

//Rout Login Admin
Route::get('/masukAdmin', 'Admin@index');
//Route::get('/adminGenerate', 'Admin@adminGenerate');
Route::post('/masukAdmin','Admin@masukAdmin');
Route::get('/listAdmin','Admin@listAdmin');
Route::post('/tambahAdmin','Admin@tambahAdmin');
Route::post('/ubahAdmin','Admin@ubahAdmin');
Route::get('/hapusHapis/{id}','Admin@hapusAdmin');

Route::get('/keluarAdmin','Admin@keluarAdmin');
Route::post('/ubahPasswordAdm','Admin@ubahPassword');


//Route Halaman pengajuan
Route::get('/pengajuan', 'Pengajuan@pengajuan');

//Route Halaman Pengadaan
Route::get('/listPengadaan', 'Pengadaan@index');
Route::post('/tambahPengadaan', 'Pengadaan@tambahPengadaan');
Route::get('/hapusGambar/{id}','Pengadaan@hapusGambar');
Route::post('/uploadGambar', 'Pengadaan@uploadGambar');
Route::get('/hapusPengadaan/{id}','Pengadaan@hapusPengadaan');
Route::post('/ubahPengadaan', 'Pengadaan@ubahPengadaan');
