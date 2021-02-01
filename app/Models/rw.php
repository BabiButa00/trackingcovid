<?php

namespace App\Models;
use App\Models\Kelurahan;
use App\Models\Kasus2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rw extends Model
{
    public function Kelurahan(){
        return $this->belongsTo('App\Models\Kelurahan','id_kelurahan');
    }
    public function Kasus2(){
        return $this->belongsTo('App\Models\Kasus2','id_rw');
    }
    use HasFactory;
}
