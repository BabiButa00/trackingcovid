<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Http;




class ApiController extends Controller
{
    public $data = [];
    public function global()
    {
        $response = Http::get('https://api.kawalcorona.com')->json();
        foreach ($response as $data => $val) {
        $raw = $val['attributes'];
        $res = [
            'Negara' => $raw['Country_Region'],
            'Positif' => $raw['Confirmed'],
            'Sembuh' => $raw['Recovered'],
            'Meninggal' => $raw['Deaths']
        ];
        array_push($this->data, $res);
    }
    $data = [
        'Succes' => true,
        'Data' => $this->data,
        'Message' => 'Berhasil'
    ];
    return response()->json($data,200);
    }
    public function Indonesia(){
        $positif = DB::table('trackings')
                        ->sum('trackings.positif');

        $sembuh = DB::table('trackings')
                        ->sum('trackings.sembuh');

        $meninggal = DB::table('trackings')
                        ->sum('trackings.meninggal');

        return response([
                    'Success' => true,
                    'Data' => [
                    'Name' => 'Indonesia',
                    'Positif'=> $positif,
                    'Sembuh'=> $sembuh,
                    'Meninggal'=> $meninggal,
                            ],
                                    'Message' => ' Berhasil!',

                        ]);

    }
    public function provinsi(){
        $allday = DB::table('provinsis')
        ->select('provinsis.kode_provinsi','provinsis.nama_provinsi',
        DB::raw('SUM(trackings.positif) as positif'),
        DB::raw('SUM(trackings.sembuh) as sembuh'),
        DB::raw('SUM(trackings.meninggal) as meninggal'))
        ->join('kotas','provinsis.id','=','kotas.id_provinsi')
        ->join('kecamatans','kotas.id','=','kecamatans.id_kota')
        ->join('kelurahans','kecamatans.id','=','kelurahans.id_kecamatan')
        ->join('rws','kelurahans.id','=','rws.id_kelurahan')
        ->join('trackings','rws.id','=','trackings.id_rw')
        ->groupBy('provinsis.id')
        ->get();

        $today = DB::table('provinsis')
        ->select('provinsis.kode_provinsi','provinsis.nama_provinsi',
        DB::raw('SUM(trackings.positif) as positif'),
        DB::raw('SUM(trackings.sembuh) as sembuh'),
        DB::raw('SUM(trackings.meninggal) as meninggal'))
        ->join('kotas','provinsis.id','=','kotas.id_provinsi')
        ->join('kecamatans','kotas.id','=','kecamatans.id_kota')
        ->join('kelurahans','kecamatans.id','=','kelurahans.id_kecamatan')
        ->join('rws','kelurahans.id','=','rws.id_kelurahan')
        ->join('trackings','rws.id','=','trackings.id_rw')
        ->whereDate('trackings.tanggal',Carbon::today())
        ->groupBy('provinsis.id')
        ->get();

            $positif = DB::table('rws')->select('trackings.positif')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.positif');
            $sembuh = DB::table('rws')->select('trackings.sembuh')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.sembuh');
            $meninggal = DB::table('rws')->select('trackings.meninggal')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.meninggal');
        // dd($provinsi);
        return response([
            'Success' => true,
            'Data' => [
                        'Hari Ini' => $today,
            'Data' => [
                        'Provinsi' => $allday,
            'Total' =>[
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal,
                    ],
                    'Message' => ' Berhasil!',
                ],
            ],
        ]);

    }

    public function provinsis($id){

        $provinsi = DB::table('provinsis') ->select('provinsis.kode_provinsi','provinsis.nama_provinsi',
        DB::raw('SUM(trackings.positif) as positif'),
        DB::raw('SUM(trackings.sembuh) as sembuh'),
        DB::raw('SUM(trackings.meninggal) as meninggal'))
        ->join('kotas','provinsis.id','=','kotas.id_provinsi')
        ->join('kecamatans','kotas.id','=','kecamatans.id_kota')
        ->join('kelurahans','kecamatans.id','=','kelurahans.id_kecamatan')
        ->join('rws','kelurahans.id','=','rws.id_kelurahan')
        ->join('trackings','rws.id','=','trackings.id_rw')
        ->where('provinsis.id',$id)
        ->groupBy('provinsis.id')
        ->first();
            $positif = DB::table('rws')->select('trackings.positif')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.positif');
            $sembuh = DB::table('rws')->select('trackings.sembuh')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.sembuh');
            $meninggal = DB::table('rws')->select('trackings.meninggal')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.meninggal');
        // dd($provinsi);
        return response([
            'Success' => true,
            'Data' => $provinsi,
            'Total' =>[
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal,
                    ],
                    'message' => ' Berhasil!',

        ]);
    }
    public function kota(){
        $allday = DB::table('kotas')
        ->select('kotas.kode_kota','kotas.nama_kota',
        DB::raw('SUM(trackings.positif) as positif'),
        DB::raw('SUM(trackings.sembuh) as sembuh'),
        DB::raw('SUM(trackings.meninggal) as meninggal'))
        ->join('kecamatans','kotas.id','=','kecamatans.id_kota')
        ->join('kelurahans','kecamatans.id','=','kelurahans.id_kecamatan')
        ->join('rws','kelurahans.id','=','rws.id_kelurahan')
        ->join('trackings','rws.id','=','trackings.id_rw')
        ->groupBy('kotas.id')
        ->get();

        $today = DB::table('kotas')
        ->select('kotas.kode_kota','kotas.nama_kota',
        DB::raw('SUM(trackings.positif) as positif'),
        DB::raw('SUM(trackings.sembuh) as sembuh'),
        DB::raw('SUM(trackings.meninggal) as meninggal'))
        ->join('kecamatans','kotas.id','=','kecamatans.id_kota')
        ->join('kelurahans','kecamatans.id','=','kelurahans.id_kecamatan')
        ->join('rws','kelurahans.id','=','rws.id_kelurahan')
        ->join('trackings','rws.id','=','trackings.id_rw')
        ->whereDate('trackings.tanggal',Carbon::today())
        ->groupBy('kotas.id')
        ->get();

            $positif = DB::table('rws')->select('trackings.positif')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.positif');
            $sembuh = DB::table('rws')->select('trackings.sembuh')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.sembuh');
            $meninggal = DB::table('rws')->select('trackings.meninggal')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.meninggal');
        // dd($provinsi);
        return response([
            'Success' => true,
            'Data' => [
                        'Hari Ini' => $allday,
            'Data' => [
                        'Kota' => $today,            
            'Total' =>[
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal,
                    ],
                    'message' => ' Berhasil!',
                ],
            ],
        ]);

    }
    public function kotas($id){
        $kota = DB::table('kotas')
        ->select('kotas.kode_kota','kotas.nama_kota',
        DB::raw('SUM(trackings.positif) as positif'),
        DB::raw('SUM(trackings.sembuh) as sembuh'),
        DB::raw('SUM(trackings.meninggal) as meninggal'))
        ->join('kecamatans','kotas.id','=','kecamatans.id_kota')
        ->join('kelurahans','kecamatans.id','=','kelurahans.id_kecamatan')
        ->join('rws','kelurahans.id','=','rws.id_kelurahan')
        ->join('trackings','rws.id','=','trackings.id_rw')
        ->where('kotas.id',$id)
        ->groupBy('kotas.id')
        ->first();
            $positif = DB::table('rws')->select('trackings.positif')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.positif');
            $sembuh = DB::table('rws')->select('trackings.sembuh')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.sembuh');
            $meninggal = DB::table('rws')->select('trackings.meninggal')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.meninggal');
        // dd($provinsi);
        return response([
            'Success' => true,
            'Data' => $kota,
            'Total' =>[
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal,
                    ],
                    'message' => ' Berhasil!',
        ]);

    }
    public function kecamatan(){
        $allday = DB::table('kecamatans')
        ->select('kecamatans.nama_kecamatan',
        DB::raw('SUM(trackings.positif) as positif'),
        DB::raw('SUM(trackings.sembuh) as sembuh'),
        DB::raw('SUM(trackings.meninggal) as meninggal'))
        ->join('kelurahans','kecamatans.id','=','kelurahans.id_kecamatan')
        ->join('rws','kelurahans.id','=','rws.id_kelurahan')
        ->join('trackings','rws.id','=','trackings.id_rw')
        ->groupBy('kecamatans.id')
        ->get();

        $today = DB::table('kecamatans')
        ->select('kecamatans.nama_kecamatan',
        DB::raw('SUM(trackings.positif) as positif'),
        DB::raw('SUM(trackings.sembuh) as sembuh'),
        DB::raw('SUM(trackings.meninggal) as meninggal'))
        ->join('kelurahans','kecamatans.id','=','kelurahans.id_kecamatan')
        ->join('rws','kelurahans.id','=','rws.id_kelurahan')
        ->join('trackings','rws.id','=','trackings.id_rw')
        ->whereDate('trackings.tanggal',Carbon::today())
        ->groupBy('kecamatans.id')
        ->get();

            $positif = DB::table('rws')->select('trackings.positif')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.positif');
            $sembuh = DB::table('rws')->select('trackings.sembuh')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.sembuh');
            $meninggal = DB::table('rws')->select('trackings.meninggal')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.meninggal');
        // dd($provinsi);
        return response([
            'Success' => true,
            'Data' => [
                        'Hari Ini' => $today,
            'Data' => [
                        'Kecamatan' => $allday,            
            'Total' =>[
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal,
                    ],
                    'message' => ' Berhasil!',
                ],
            ],
        ]);

    }
    public function kecamatans($id){
        $kecamatan = DB::table('kecamatans')
        ->select('kecamatans.nama_kecamatan',
        DB::raw('SUM(trackings.positif) as positif'),
        DB::raw('SUM(trackings.sembuh) as sembuh'),
        DB::raw('SUM(trackings.meninggal) as meninggal'))
        ->join('kelurahans','kecamatans.id','=','kelurahans.id_kecamatan')
        ->join('rws','kelurahans.id','=','rws.id_kelurahan')
        ->join('trackings','rws.id','=','trackings.id_rw')
        ->where('kecamatans.id',$id)
        ->groupBy('kecamatans.id','tanggal')
        ->first();
            $positif = DB::table('rws')->select('trackings.positif')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.positif');
            $sembuh = DB::table('rws')->select('trackings.sembuh')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.sembuh');
            $meninggal = DB::table('rws')->select('trackings.meninggal')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.meninggal');
        // dd($provinsi);
        return response([
            'success' => true,
            'data' => $kecamatan,
            'Total' =>[
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal,
                    ],
                    'message' => ' Berhasil!',
        ]);

    }
    public function kelurahan(){
        $allday = DB::table('kelurahans')
        ->select('kelurahans.nama_kelurahan',
        DB::raw('SUM(trackings.positif) as positif'),
        DB::raw('SUM(trackings.sembuh) as sembuh'),
        DB::raw('SUM(trackings.meninggal) as meninggal'))
        ->join('rws','kelurahans.id','=','rws.id_kelurahan')
        ->join('trackings','rws.id','=','trackings.id_rw')
        ->groupBy('kelurahans.id')
        ->get();

        $today = DB::table('kelurahans')
        ->select('kelurahans.nama_kelurahan',
        DB::raw('SUM(trackings.positif) as positif'),
        DB::raw('SUM(trackings.sembuh) as sembuh'),
        DB::raw('SUM(trackings.meninggal) as meninggal'))
        ->join('rws','kelurahans.id','=','rws.id_kelurahan')
        ->join('trackings','rws.id','=','trackings.id_rw')
        ->whereDate('trackings.tanggal',Carbon::today())
        ->groupBy('kelurahans.id')
        ->get();

            $positif = DB::table('rws')->select('trackings.positif')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.positif');
            $sembuh = DB::table('rws')->select('trackings.sembuh')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.sembuh');
            $meninggal = DB::table('rws')->select('trackings.meninggal')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.meninggal');
        // dd($provinsi);
        return response([
            'Success' => true,
            'Data' => [
                        'Hari Ini' => $today,
            'Data' => [
                        'Kecamatan' => $allday,      
            'Total' =>[
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal,
                    ],
                    'message' => ' Berhasil!',
                ],
            ],
        ]);

    }
    public function kelurahans($id){
        $kelurahan = DB::table('kelurahans')
        ->select('kelurahans.nama_kelurahan',
        DB::raw('SUM(trackings.positif) as positif'),
        DB::raw('SUM(trackings.sembuh) as sembuh'),
        DB::raw('SUM(trackings.meninggal) as meninggal'))
        ->join('rws','kelurahans.id','=','rws.id_kelurahan')
        ->join('trackings','rws.id','=','trackings.id_rw')
        ->where('kelurahans.id',$id)
        ->groupBy('kelurahans.id','tanggal')
        ->first();
            $positif = DB::table('rws')->select('trackings.positif')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.positif');
            $sembuh = DB::table('rws')->select('trackings.sembuh')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.sembuh');
            $meninggal = DB::table('rws')->select('trackings.meninggal')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.meninggal');
        // dd($provinsi);
        return response([
            'Success' => true,
            'Data'  => $kelurahan,
            'Total' =>[
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal,
                    ],
                    'message' => ' Berhasil!',
        ]);

    }
    public function rw(){
        $allday = DB::table('rws')
        ->select('rws.nama_rw',
        DB::raw('SUM(trackings.positif) as positif'),
        DB::raw('SUM(trackings.sembuh) as sembuh'),
        DB::raw('SUM(trackings.meninggal) as meninggal'))
        ->join('trackings','rws.id','=','trackings.id_rw')
        ->groupBy('rws.id','tanggal')
        ->get();

        $today = DB::table('rws')
        ->select('rws.nama_rw',
        DB::raw('SUM(trackings.positif) as positif'),
        DB::raw('SUM(trackings.sembuh) as sembuh'),
        DB::raw('SUM(trackings.meninggal) as meninggal'))
        ->join('trackings','rws.id','=','trackings.id_rw')
        ->whereDate('trackings.tanggal',Carbon::today())
        ->groupBy('rws.id','tanggal')
        ->get();

            $positif = DB::table('rws')->select('trackings.positif')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.positif');
            $sembuh = DB::table('rws')->select('trackings.sembuh')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.sembuh');
            $meninggal = DB::table('rws')->select('trackings.meninggal')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.meninggal');
        // dd($provinsi);
        return response([
            'Success' => true,
            'Data' => [
                        'Hari Ini' => $today,
            'Data' => [
                        'Rw' => $allday,
            'Total' =>[
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal,
                    ],
                    'Message' => ' Berhasil!',
                ],
            ],
        ]);

    }
    public function rws($id){
        $rw = DB::table('rws')
        ->select('rws.nama_rw',
        DB::raw('SUM(trackings.positif) as positif'),
        DB::raw('SUM(trackings.sembuh) as sembuh'),
        DB::raw('SUM(trackings.meninggal) as meninggal'))
        ->join('trackings','rws.id','=','trackings.id_rw')
        ->where('rws.id',$id)
        ->groupBy('rws.id','tanggal')
        ->first();
            $positif = DB::table('rws')->select('trackings.positif')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.positif');
            $sembuh = DB::table('rws')->select('trackings.sembuh')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.sembuh');
            $meninggal = DB::table('rws')->select('trackings.meninggal')->join('trackings','rws.id','=','trackings.id_rw')->sum('trackings.meninggal');
        // dd($provinsi);
        return response([
            'Success' => true,
            'Data' => $rw,
            'Total' =>[
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal,
                    ],
                    'Message' => ' Berhasil!',
        ]);

    }

        public function positif(){
        $positif = DB::table('trackings')
                            ->sum('trackings.positif');
        return response([
            'Success' => true,
            'Data' => [
                'Name' => 'Total Positif',
                'Value' => $positif,
            ],
                    'Message' => ' Berhasil!',

        ]);
    }
    public function sembuh(){
        $sembuh = DB::table('trackings')
                        ->sum('trackings.sembuh');
        return response([
            'Success' => true,
            'Data' => [
                        'Name' => 'Total Sembuh',
                        'Value' => $sembuh,
            ],
                    'Message' => ' Berhasil!',

        ]);
    }
    public function meninggal(){
        $meninggal = DB::table('trackings')
                            ->sum('trackings.meninggal');
        return response([
            'Success' => true,
            'Data' => [
                        'Name' => 'Total Meninggal',
                        'Value' => $meninggal,
            ],
                    'Message' => ' Berhasil!',

        ]);
    }
}