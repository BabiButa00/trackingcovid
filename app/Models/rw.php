<?php

namespace App\Models;
use App\Models\Kelurahan;
use App\Models\Kasus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    public function Kelurahan () {
        return $this->belongsTo('App\Models\kelurahan','id_kelurahan');
    }
    public function Kasus () {
        return $this->hasMany('App\Models\Kasus','id_rw');
    }
    use HasFactory;
}