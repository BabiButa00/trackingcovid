@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> 
                    Lihat Data Kota
                </div>
                <div class="form-group">
                        <label>Nama Provinsi</label>
                        <select name="kode_kota" class="form-control">
                            @foreach ($kota as $data)
                            <option value="{{$data->id}}" readonly>{{$data->kode_kota}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kode Kecamatan</label>
                            <input type="text" name="kode_kecamatan" class="form-control" value="{{$kecamatan->kode_kecamatan}}" id="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kecamatan</label>
                            <input type="text" name="nama_kecamatan" class="form-control" value="{{$kecamatan->nama_kecamatan}}" id="" readonly>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection