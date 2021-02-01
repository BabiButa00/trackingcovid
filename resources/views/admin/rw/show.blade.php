@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> 
                    Lihat Data Rw
                </div>
                <div class="card-body">
                <div class="form-group">
                        <label>Id Kelurahan</label>
                        <select name="id_kelurahan" class="form-control">
                            @foreach ($kelurahan as $data)
                            <option value="{{$data->id}}">{{$data->id_kelurahan}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Id Rw</label>
                            <input type="text" name="id_rw" class="form-control" value="{{$rw->id_rw}}" id="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Rw</label>
                            <input type="text" name="nama" class="form-control" value="{{$rw->nama}}" id="" readonly>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection