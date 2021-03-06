@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><br>
                EDIT
                </div>

                <div class="card-body">
                <form action="{{route('kota.update',$kota->id)}}" method="POST">
                   @csrf
                   @method('PATCH')
                    <div class="form-group">
                        <label>KODE KOTA</label>
                        <input type="text" name="kode_kota" value="{{$kota->kode_kota}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>NAMA KOTA</label>
                        <input type="text" name="nama_kota" value="{{$kota->nama_kota}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label>NAMA PROVINSI</label>
                        <select name="id_provinsi" class="form-control">
                        @foreach ($provinsi as $data)
                        <option value="{{$data->id}}" {{$data->id == $kota->id_provinsi ? 'selected' : ''}}>{{$data->nama_provinsi}}</option>
                        @endforeach
                        </select>
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