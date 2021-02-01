@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> 
                    Tambah Data Kelurahan
                </div>
                <div class="card-body">
                    <form action="{{route('kelurahan.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                        <label>Kode Kecamatan</label>
                        <select name="kode_kecamatan" class="form-control">
                            @foreach ($kecamatan as $data)
                            <option value="{{$data->id}}">{{$data->kode_kecamatan}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Id Kelurahan</label>
                            <input type="text" name="id_kelurahan" class="form-control" id="" require>
                            @if ($errors->has('id_kelurahan'))
                                <span class="text-danger">{{ $errors->first('id_kelurahan') }}</span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kelurahan</label>
                            <input type="text" name="nama_kelurahan" class="form-control" id="" require>
                            @if ($errors->has('nama_kelurahan'))
                                <span class="text-danger">{{ $errors->first('nama_kelurahan') }}</span>
                                @endif
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