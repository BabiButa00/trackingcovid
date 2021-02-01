<?php

namespace App\Models;
use App\Models\Kecamatan;
use App\Models\Rw;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelurahan extends Model
{
    public function Kecamatan(){
        return $this->belongsTo('App\Models\Kecamatan','kode_kecamatan');
    }
    public function Rw(){
        return $this->belongsTo('App\Models\Rw','id_kelurahan');
    }
    use HasFactory;
}
