<?php

namespace App\Models;
use App\Models\Provinsi;
use App\Models\Kecamatan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kota extends Model
{
    public function Provinsi(){
        return $this->belongsTo('App\Models\Provinsi','kode_provinsi');
    }
    public function Kecamatan(){
        return $this->belongsTo('App\Models\Kecamatan','kode_kota');
    }
    use HasFactory;
}
