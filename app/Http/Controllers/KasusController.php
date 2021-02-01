<?php

namespace App\Http\Controllers;
use App\Models\Rw;
use App\Models\Kasus;
use Illuminate\Http\Request;

class KasusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kasus = Kasus::with('rw')->get();
        return view('admin.kasus.index',compact('kasus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rw = Rw::all();
        return view('admin.kasus.create',compact('rw'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kasus = new Kasus();
        $kasus->id_rw =$request->id_rw;
        $kasus->jumlah_positif =$request->positif;
        $kasus->jumlah_sembuh =$request->sembuh;
        $kasus->jumlah_meninggal =$request->meninggal;
        $kasus->tanggal =$request->tanggal;
        $kasus->save();
        return redirect()->route('kasus.index')->with(['succes'=>'Data Berhasil diinput']);   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kasus = Kasus::findOrFail($id);
        return view('admin.kasus.show',compact('kasus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rw = Rw::all();
        $kasus = Rw::findOrFail($id);
        return view('admin.kasus.edit',compact('kasus','rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kasus = Kasus::findOrFail($id);
        $kasus->id_rw =$request->id_rw;
        $kasus->positif   =$request->positif;
        $kasus->sembuh    =$request->sembuh;
        $kasus->meninggal =$request->meninggal;
        $kasus->tanggal   =$request->tanggal;
        $kasus->save();
        return redirect()->route('kasus.index')->with(['succes'=>'Data <b>',$kasus->positif,'</b>Data Berhasil diubah']); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kasus = Kasus::findOrFail($id);
        $kasus->delete();
        return redirect()->route('kasus.index')->with(['success'=>'Data <b>',$kasus->positif,'</b> Berhasil dihapus']);
    }
}