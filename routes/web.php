<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    KelasController,
    SiswaController,
    MapelController,
    GuruController,
    DashboardController,
    AuthController
};

Route::get('/', function () {
    return view('home');
});

// route login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('login.postlogin');

//route logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'checkrole:admin']], function(){
    // route dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    //route kelas
    Route::get('/kelas/data', [KelasController::class, 'data'])->name('kelas.data');
    Route::resource('/kelas', KelasController::class);

    //route siswa
    Route::get('/siswa/data', [SiswaController::class, 'data'])->name('siswa.data');
    Route::resource('/siswa', SiswaController::class);
    Route::get('/siswa/profile/{id}', [SiswaController::class, 'profile'])->name('component.siswa.profile');
    
    //route mapel
    Route::get('/mapel/data', [MapelController::class, 'data'])->name('mapel.data');
    Route::resource('/mapel', MapelController::class);

    //route guru
    Route::get('/guru/data', [GuruController::class, 'data'])->name('guru.data');
    Route::resource('/guru', GuruController::class);
});

Route::group(['middleware' => ['auth', 'checkrole:admin,siswa']], function(){
    // route dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});