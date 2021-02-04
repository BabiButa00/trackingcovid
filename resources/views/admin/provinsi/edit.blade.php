@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header"><br>
                EDIT
                </div>
                <div class="card-body">
                <form action="{{route('provinsi.update',$provinsi->id)}}" method="POST">
                   @csrf
                   @method('PATCH')
                    <div class="form-group">
                        <label>KODE PROVINSI</label>
                        <input type="text" name="kode_provinsi" value="{{$provinsi->kode_provinsi}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>NAMA PROVINSI</label>
                        <input type="text" name="nama_provinsi" value="{{$provinsi->nama_provinsi}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection