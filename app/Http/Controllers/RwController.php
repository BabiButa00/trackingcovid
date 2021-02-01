<?php

namespace App\Http\Controllers;

use App\Models\Rw;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class RwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rw = Rw::with('kelurahan')->get();
        return view('admin.rw.index', compact('rw'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelurahan = Kelurahan::all();
        return view('admin.rw.create', compact('kelurahan'));
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
            'id_rw' => 'required|max:4|unique:rws',
            'nama' => 'required|unique:rws',
        ], [
            'id_rw.required' => 'Kode Harus Di isi!',
            'id_rw.max' => 'Kode Maksimal 4 Nomor',
            'id_rw.unique' => 'Kode Sudah Di Pakai',
            'nama_rw.require' => 'Nama Rw Harus Di isi',
            'nama_rw.unique' => 'Nama Sudah Di Pakai!',
        ]);
        $rw = new Rw();
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->id_rw = $request->id_rw;
        $rw->nama = $request->nama;
        $rw->save();
        return redirect()->route('rw.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rw = Rw::findOrFail($id);
        $kelurahan = Kelurahan::all();
        return view('admin.rw.show',compact('rw','kelurahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rw = Rw::findOrFail($id);
        $kelurahan = Kelurahan::all();
        $selected = $rw->kelurahan->pluck('id')->toArray();
        return view('admin.rw.edit',compact('rw','kelurahan','selected'));
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
        $rw = Rw::findOrFail($id);
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->id_rw = $request->id_rw;
        $rw->nama = $request->nama;
        $rw->save();
        return redirect()->route('rw.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rw = Rw::findOrFail($id);
        $rw->delete();
        return redirect()->route('rw.index');
        
    }
}