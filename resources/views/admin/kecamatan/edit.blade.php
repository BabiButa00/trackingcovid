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
                <form action="{{route('kecamatan.update',$kecamatan->id)}}" method="POST">
                   @csrf
                   @method('PATCH')
                    <div class="form-group">
                        <label>NAMA KECAMATAN</label>
                        <input type="text" name="nama_kecamatan" value="{{$kecamatan->nama_kecamatan}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label>NAMA KOTAs</label>
                        <select name="id_kota" class="form-control">
                        @foreach ($kota as $data)
                        <option value="{{$data->id}}" {{$data->id == $kecamatan->id_kota ? 'selected' : ''}}>{{$data->nama_kota}}</option>
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