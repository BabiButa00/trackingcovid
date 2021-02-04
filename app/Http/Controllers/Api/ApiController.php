<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Provinsi;
use App\Models\Tracking;



class ApiController extends Controller
{
    public function Indonesia(){
        $reaktif = DB::table('trackings')
                        ->select('trackings.reaktif')
                        ->sum('trackings.reaktif');

        $positif = DB::table('trackings')
                        ->select('trackings.positif')
                        ->sum('trackings.positif');

        $sembuh = DB::table('trackings')
                        ->select('trackings.sembuh')
                        ->sum('trackings.sembuh');

        $meninggal = DB::table('trackings')
                        ->select('trackings.meninggal')
                        ->sum('trackings.meninggal');

        return response([
                    'success' => true,
                    'data' => [
                    'name' => 'Indonesia',
                    'reaktif'=> $reaktif,
                    'positif'=> $positif,
                    'sembuh'=> $sembuh,
                    'meninggal'=> $meninggal,
                            ],
                                    'message' => ' Berhasil!',

                        ]);

    }
    public function provinsi(){
        $provinsi = DB::table('provinsis')
        ->select('provinsis.kode_provinsi','provinsis.nama_provinsi',
        DB::raw('SUM(trackings.reaktif) as reaktif'),
        DB::raw('SUM(trackings.positif) as positif'),
        DB::raw('SUM(trackings.sembuh) as sembuh'),
        DB::raw('SUM(trackings.meninggal) as meninggal'))
        ->join('kotas','provinsis.id','=','kotas.id_provinsi')
        ->join('kecamatans','kotas.id','=','kecamatans.id_kota')
        ->join('kelurahans','kecamatans.id','=','kelurahans.id_kecamatan')
        ->join('rws','kelurahans.id','=','rws.id_kelurahan')
        ->join('trackings','rws.id','=','trackings.id_rw')
        ->groupBy('provinsis.id','tanggal')
        ->get();
            $reaktif = DB::table('rws')->select('trackings.reaktif')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.reaktif');
            $positif = DB::table('rws')->select('trackings.positif')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.positif');
            $sembuh = DB::table('rws')->select('trackings.sembuh')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.sembuh');
            $meninggal = DB::table('rws')->select('trackings.meninggal')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.meninggal');
        // dd($provinsi);
        return response([
            'success' => true,
            'data' => [
                        'Hari Ini' => $provinsi,
            'Total' =>[
                        'Jumlah Reaktif' => $reaktif,
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal,
                    ],
                    'message' => ' Berhasil!',
                ],
        ]);

    }

    public function pw($id){

        $provinsi = DB::table('provinsis') ->select('provinsis.kode_provinsi','provinsis.nama_provinsi',
        DB::raw('SUM(trackings.positif) as positif'),
        DB::raw('SUM(trackings.sembuh) as sembuh'),
        DB::raw('SUM(trackings.meninggal) as meninggal'))
        ->join('kotas','provinsis.id','=','kotas.id_provinsi')
        ->join('kecamatans','kotas.id','=','kecamatans.id_kota')
        ->join('kelurahans','kecamatans.id','=','kelurahans.id_kecamatan')
        ->join('rws','kelurahans.id','=','rws.id_kelurahan')
        ->join('trackings','rws.id','=','trackings.id_rw')
        ->groupBy('provinsis.id','tanggal')
        ->first();
            $positif = DB::table('rws')->select('trackings.positif')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.positif');
            $reaktif = DB::table('rws')->select('trackings.reaktif')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.reaktif');
            $sembuh = DB::table('rws')->select('trackings.sembuh')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.sembuh');
            $meninggal = DB::table('rws')->select('trackings.meninggal')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.meninggal');
        // dd($provinsi);
        return response([
            'success' => true,
            'data' => $provinsi,
            'Total' =>[
                        'Jumlah Reaktif' => $reaktif,
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal,
                    ],
                    'message' => ' Berhasil!',

        ]);
    }

    public function rw(){
        $provinsi = DB::table('trackings')->select('provinsis.nama_provinsi')->
        join('provinsis','trackings.id','=','provinsis.id')->get('trackings.nama_provisi');
        $rw =DB::table('trackings')->select([
                 DB::raw('SUM(reaktif) as Reaktif'),
                DB::raw('SUM(positif) as Positif'),
                DB::raw('SUM(sembuh) as Sembuh'),
                DB::raw('SUM(meninggal) as Meninggal'),
        ])->groupBy('tanggal')->get();
        $positif = DB::table('rws')->select('trackings.positif')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.positif');
        $reaktif = DB::table('rws')->select('trackings.reaktif')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.reaktif');
        $sembuh = DB::table('rws')->select('trackings.sembuh')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.sembuh');
        $meninggal = DB::table('rws')->select('trackings.meninggal')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.meninggal');
            return response([
                'success' => true,
                'data' => [
                            'Hari Ini' => $rw,
                'Total' =>[ 'Jumlah Reaktif' => $reaktif,
                            'Jumlah Positif' => $positif,
                            'Jumlah Sembuh' => $sembuh,
                            'Jumlah Meninggal' => $meninggal,
                        ],
                        'message' => ' Berhasil!',
                    ],
            ]);
    }
    public function reaktif(){
        $reaktif = DB::table('trackings')->select('trackings.reaktif')->sum('trackings.reaktif');
        return response([
            'success' => true,
            'data' => [
                'name' => 'Total Reaktif',
                'value'=> $reaktif,
            ],
                    'message' => ' Berhasil!',

        ]);
    }
    public function positif(){
        $positif = DB::table('trackings')->select('trackings.positif')->sum('trackings.positif');
        return response([
            'success' => true,
            'data' => [
                'name' => 'Total Positif',
                'value' => $positif,
            ],
                    'message' => ' Berhasil!',

        ]);
    }
    public function sembuh(){
        $sembuh = DB::table('trackings')->select('trackings.sembuh')->sum('trackings.sembuh');
        return response([
            'success' => true,
            'data' => [
                        'name' => 'Total Sembuh',
                        'value' => $sembuh,
            ],
                    'message' => ' Berhasil!',

        ]);
    }
    public function meninggal(){
        $meninggal = DB::table('trackings')->select('trackings.meninggal')->sum('trackings.meninggal');
        return response([
            'success' => true,
            'data' => [
                        'name' => 'Total Meninggal',
                        'value' => $meninggal,
            ],
                    'message' => ' Berhasil!',

        ]);
    }
}