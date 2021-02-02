@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><br>
                    Daftar Kota
                <a href="{{route('kota.create')}}" class="btn btn-primary float-right">
                Tambah Data</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Kode Kota</th>
                                    <th>Nama Kota</th>
                                    <th>Nama Provinsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach ($kota as $data)
                                <form action="{{route('kota.destroy',$data->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$data->kode_kota}}</td>
                                        <td>{{$data->nama_kota}}</td>
                                        <td>{{$data->provinsi->nama_provinsi}}</td>
                                        <form action="{{route('kota.destroy',$data->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <td>
                                            <a class="btn btn-info btn-sm btn-rounded " href="{{route('kota.edit',$data->id)}}"> <i class="fa fa-edit"></i></a>
                                            <a class="btn btn-warning btn-sm btn-rounded " href="{{route('kota.show',$data->id)}}"> <i class="fa fa-eye"></i></a>
                                            <button type="submit" onclick="return confirm('Apakah anda yakin?');" class="btn btn-danger btn-sm btn-rounded"><i class="fa fa-trash"></i></button>
                                        </td>
                                        </form>
                                    </tr>
                                </form>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection