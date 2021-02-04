@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header"><br>
                SHOW
                </div>
                <div class="card-body">
                    <div class="form-group">
                    <label>KODE PROVINSI</label>
                    <input type="text" name="kode_provinsi" value="{{$provinsi->kode_provinsi}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                    <label>NAMA PROVINSI</label>
                    <input type="text" name="nama_provinsi" value="{{$provinsi->nama_provinsi}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                    <a href="{{url()->previous()}}" class="btn btn-primary">KEMBALI</a>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection