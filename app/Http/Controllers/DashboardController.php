<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        return view('component.dashboard.index', compact('guru', 'siswa', 'kelas', 'mapel'));

        $id_siswa = auth()->user()->id;

        $find_siswa = Siswa::where('user_id', $id_siswa)->get();
        return view('component.dashboard.index', compact('guru', 'siswa', 'kelas', 'mapel', 'find_siswa'));
    }
}