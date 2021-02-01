@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> 
                    Edit Data Kota
                </div>
                <div class="card-body">
                    <form action="{{route('kota.update',$kota->id)}}" method="post">
                        @csrf @method('put')
                        <div class="form-group">
                        <label>Kode Provinsi</label>
                        <select name="kode_provinsi" class="form-control">
                            @foreach ($provinsi as $data)
                            <option value="{{$data->id}}">{{$data->kode_provinsi}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kode Kota</label>
                            <input type="text" name="kode_kota" class="form-control" value="{{$kota->kode_kota}}" require>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kota</label>
                            <input type="text" name="nama_kota" class="form-control" value="{{$kota->nama_kota}}" require>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection