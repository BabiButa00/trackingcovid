@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><br>
                TAMBAH KOTA
                </div>
                <div class="card-body">
                <form action="{{route('kota.store')}}" method="POST">
                   @csrf
                    <div class="form-group">
                        <label>KODE KOTA</label>
                        <input type="text" name="kode_kota" class="form-control" required>
                        @if ($errors->has('kode_kota'))
                        <span class="text-danger">{{ $errors->first('kode_kota') }}</span>
                        @endif
                    </div>
                        <div class="form-group">
                        <label>NAMA KOTA</label>
                        <input type="text" name="nama_kota" class="form-control" required>
                        </div>
                        @if ($errors->has('nama_kota'))
                        <span class="text-danger">{{ $errors->first('nama_kota') }}</span>
                        @endif
                        <div class="form-group">
                        <label>NAMA PROVINSI</label>
                        <select name="id_provinsi" class="form-control">
                        @foreach ($provinsi as $data)
                        <option value="{{$data->id}}">{{$data->nama_provinsi}}</option>
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