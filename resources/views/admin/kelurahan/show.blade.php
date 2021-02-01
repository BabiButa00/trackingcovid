@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> 
                    Lihat Data Kelurahan
                </div>
                <div class="form-group">
                        <label>Kode Kecamatan</label>
                        <select name="kode_kecamatan" class="form-control">
                            @foreach ($kecamatan as $data)
                            <option value="{{$data->id}}" readonly>{{$data->kode_kecamatan}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Id Kelurahan</label>
                            <input type="text" name="id_kelurahan" class="form-control" value="{{$kelurahan->id_kelurahan}}" id="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kelurahan</label>
                            <input type="text" name="nama_kelurahan" class="form-control" value="{{$kelurahan->nama_kelurahan}}" id="" readonly>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection