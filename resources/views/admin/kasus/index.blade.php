@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><br>
                    Daftar Kasus
                <a href="{{route('kasus.create')}}" class="btn btn-primary float-right">
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
                                    <th>Id Rw</th>
                                    <th>Jumlah Positif</th>
                                    <th>Jumlah Sembuh</th>
                                    <th>Jumlah Meninggal </th>
                                    <th>Tanggal</th>
                                    <th colspan="3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach ($kasus as $data)
                                <form action="{{route('kasus.destroy',$data->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$data->id_rw}}</td>
                                        <td>{{$data->jumlah_positif}}</td>
                                        <td>{{$data->jumlah_sembuh}}</td>
                                        <td>{{$data->jumlah_meninggal}}</td>
                                        <td>{{$data->tanggal}}</td>
                                        <form action="{{route('kasus.destroy',$data->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <td>
                                            <a href="{{route('kasus.show',$data->id)}}" class="btn btn-info">Show</a>
                                            <a href="{{route('kasus.edit',$data->id)}}" class="btn btn-success">Edit</a>
                                            <button type="submit" onclick="return confirm('Apakah anda yakin?');" class="btn btn-danger">Delete</button>
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