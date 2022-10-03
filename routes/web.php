<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    KelasController,
    SiswaController,
    MapelController,
    GuruController
};

Route::get('/', function () {
    return view('home');
});

Route::get('/guru', function () {
    return view('component.guru.index');
});

 // route halaman utama
//  Route::resource('/', HomeController::class);

 //route kelas
 Route::get('/kelas/data', [KelasController::class, 'data'])->name('kelas.data');
 Route::resource('/kelas', KelasController::class);
 Route::get('/kelas/edit/{id}', [KelasController::class, 'edit']);
 Route::get('/kelas/hapus/{id}', [KelasController::class, 'destroy']);

 //route siswa
 Route::get('/siswa/data', [SiswaController::class, 'data'])->name('siswa.data');
 Route::resource('/siswa', SiswaController::class);
 Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit']);
 Route::get('/siswa/hapus/{id}', [SiswaController::class, 'destroy']);

 //route mapel
 Route::get('/mapel/data', [MapelController::class, 'data'])->name('mapel.data');
 Route::resource('/mapel', MapelController::class);
 Route::get('/mapel/edit/{id}', [MapelController::class, 'edit']);
 Route::get('/mapel/hapus/{id}', [MapelController::class, 'destroy']);

 //route guru
 Route::get('/guru/data', [GuruController::class, 'data'])->name('guru.data');
 Route::resource('/guru', GuruController::class);
 Route::get('/guru/edit/{id}', [GuruController::class, 'edit']);
 Route::get('/guru/hapus/{id}', [GuruController::class, 'destroy']);