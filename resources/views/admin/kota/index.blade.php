@extends('layouts.master')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Kota
                    <a href="{{route('kota.create')}}" class="btn btn-primary btn-small float-right">Tambah Data</a>
                </div>
                <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Provinsi</th>
                                    <th>Kode kota</th>
                                    <th>Nama Kota</th>
                                    <th>Aksi</th>
                                </tr>
                                @php $no = 1; @endphp
                                @foreach($kota as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->kode_provinsi}}</td>
                                    <td>{{$data->kode_kota}}</td>
                                    <td>{{$data->nama_kota}}</td>
                                    <td>
                                        <form action="{{route('kota.destroy',$data->id)}}" method="POST">
                                            @csrf @method('delete')
                                            <a href="{{route('kota.edit',$data->id)}}" class="btn btn-success btn-small">Edit</a>
                                            <a href="{{route('kota.show',$data->id)}}" class="btn btn-warning btn-small">Show</a>
                                            <button type="submit" class="btn btn-danger btn-small">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
