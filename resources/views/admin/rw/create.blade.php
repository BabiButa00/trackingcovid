@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> 
                    Tambah Data Rw
                </div>
                <div class="card-body">
                    <form action="{{route('rw.store')}}" method="post">
                        @csrf
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
                            <input type="text" name="id_rw" class="form-control" id="" require>
                            @if ($errors->has('id_rw'))
                                <span class="text-danger">{{ $errors->first('id_rw') }}</span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="">Nama Rw</label>
                            <input type="text" name="nama" class="form-control" id="" require>
                            @if ($errors->has('nama'))
                                <span class="text-danger">{{ $errors->first('nama') }}</span>
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