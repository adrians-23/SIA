<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Mapel;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // search functionality
        // if($request->has('search')){
        //     $siswa = Siswa::where('nama', 'LIKE', '%' .$request->search.'%')->paginate(5);
        // }elseif($request->has('search')) {
        //     $siswa = Siswa::where('alamat', 'LIKE', '%' .$request->search.'%')->paginate(5);
        // }elseif($request->has('search')) {
        //     $siswa = Siswa::where('mapel_id', 'LIKE', '%' .$request->search.'%')->paginate(5);
        // }elseif($request->has('search')) {
        //     $siswa = Siswa::where('jenis_kelamin', 'LIKE', '%' .$request->search.'%')->paginate(5);
        // }elseif($request->has('search')) {
        //     $siswa = Siswa::where('kelas_id', 'LIKE', '%' .$request->search.'%')->paginate(5);
        // }else {
        // }

        $siswa = Siswa::paginate(5);
        $kelas_id = Kelas::all();
        $mapel_id = Mapel::all();
        return view('component.siswa.index', compact('siswa', 'kelas_id', 'mapel_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas_id = Kelas::all();
        $mapel_id = Mapel::all();
        return view('component.siswa.form', compact('kelas_id', 'mapel_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'kelas_id' => 'required',
            'mapel_id' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $siswa = Siswa::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas_id' => $request->kelas_id,
            'mapel_id' => $request->mapel_id
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan',
            'data' => $siswa
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        return response()->json($siswa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->nama = $request->nama;
        $siswa->alamat = $request->alamat;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->mapel_id = $request->mapel_id;
        $siswa->update();

        return response()->json('Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        return redirect('siswa');
    }
}