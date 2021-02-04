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
                <form action="{{route('kelurahan.update',$kelurahan->id)}}" method="POST">
                   @csrf
                   @method('PATCH')
                    <div class="form-group">
                        <label>NAMA KELURAHAN</label>
                        <input type="text" name="nama_kelurahan" value="{{$kelurahan->nama_kelurahan}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label>NAMA KECAMATAN</label>
                        <select name="id_kecamatan" class="form-control">
                        @foreach ($kecamatan as $data)
                        <option value="{{$data->id}}" {{$data->id == $kelurahan->id_kecamatan ? 'selected' : ''}}>{{$data->nama_kecamatan}}</option>
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