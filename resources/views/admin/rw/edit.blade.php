@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> 
                    Edit Data Rw
                </div>
                <div class="card-body">
                    <form action="{{route('rw.update',$rw->id)}}" method="post">
                        @csrf @method('put')
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
                            <input type="text" name="id_rw" class="form-control" value="{{$rw->id_rw}}" require>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Rw</label>
                            <input type="text" name="nama" class="form-control" value="{{$rw->nama}}" require>
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