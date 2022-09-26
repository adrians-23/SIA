<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // search functionality
        if($request->has('search')){
            $guru = Guru::where('nama', 'LIKE', '%' .$request->search.'%')->paginate(5);
        }elseif($request->has('search')) {
            $guru = Guru::where('alamat', 'LIKE', '%' .$request->search.'%')->paginate(5);
        }elseif($request->has('search')) {
            $guru = Guru::where('jenis_kelamin', 'LIKE', '%' .$request->search.'%')->paginate(5);
        }elseif($request->has('search')) {
            $guru = Guru::where('mapel_id', 'LIKE', '%' .$request->search.'%')->paginate(5);
        }else {
            $guru = Guru::paginate(5);
        }
        $mapel_id = Mapel::all();
        return view('component.guru.index', compact('guru', 'mapel_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel_id = Mapel::all();
        return view('component.guru.create', compact('mapel_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        $guru = Guru::create($request->all());

        return redirect('guru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = Guru::find($id);
        $mapel = Mapel::all();
        return view('component.guru.edit', compact('guru', 'mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        $validate = $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        $guru->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'mapel_id' => $request->mapel_id
        ]);

        return redirect('guru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Guru::find($id);
        $guru->delete();

        return redirect('guru');
    }
}
