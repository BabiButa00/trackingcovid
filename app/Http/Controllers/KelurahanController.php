<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelurahan = Kelurahan::with('kecamatan')->get();
        return view('admin.kelurahan.index', compact('kelurahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('admin.kelurahan.create', compact('kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //VALIDASI
        $request->validate([
            'id_kelurahan' => 'required|max:4|unique:kelurahans',
            'nama_kelurahan' => 'required|unique:kelurahans',
        ], [
            'id_kelurahan.required' => 'Kode Harus Di isi!',
            'id_kelurahan.max' => 'Kode Maksimal 4 Nomor',
            'id_kelurahan.unique' => 'Kode Sudah Di Pakai',
            'nama_kelurahan.require' => 'Nama provinsi Harus Di isi',
            'nama_kelurahan.unique' => 'Nama Sudah Di Pakai!',
        ]);

        $kelurahan = new Kelurahan();
        $kelurahan->kode_kecamatan = $request->kode_kecamatan;
        $kelurahan->id_kelurahan = $request->id_kelurahan;
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->save();
        return redirect()->route('kelurahan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kecamatan = Kecamatan::all();
        return view('admin.kelurahan.show',compact('kelurahan','kecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kecamatan = Kecamatan::all();
        $selected = $kelurahan->kecamatan->pluck('id')->toArray();
        return view('admin.kelurahan.edit',compact('kelurahan','kecamatan','selected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->kode_kecamatan = $request->kode_kecamatan;
        $kelurahan->id_kelurahan = $request->id_kelurahan;
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->save();
        return redirect()->route('kelurahan.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->delete();
        return redirect()->route('kelurahan.index');
        
    }
}