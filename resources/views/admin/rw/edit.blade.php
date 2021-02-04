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
                <form action="{{route('rw.update',$rw->id)}}" method="POST">
                   @csrf
                   @method('PATCH')
                    <div class="form-group">
                        <label>NAMA RW</label>
                        <input type="text" name="nama_rw" value="{{$rw->nama_rw}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label>NAMA KELURAHAN</label>
                        <select name="id_kelurahan" class="form-control">
                        @foreach ($kelurahan as $data)
                        <option value="{{$data->id}}" {{$data->id == $rw->id_kelurahan ? 'selected' : ''}}>{{$data->nama_kelurahan}}</option>
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