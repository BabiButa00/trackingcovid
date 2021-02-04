@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if (session('message'))
                <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('message') }}
                </div>
            @elseif(session('message1'))
                <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('message1') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('DATA TRACKING') }}
                <a href="{{route('tracking.create')}}" class="btn btn-primary float-right">TAMBAH DATA</a>
            </div>

            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <th scope="col">NO</th>
                                            <th scope="col"><center>LOKASI</center></th>
                                            <th scope="col"><center>RW</center></th>
                                            <th scope="col"><center>REAKTIF</center></th>
                                            <th scope="col"><center>POSITIF</center></th>
                                            <th scope="col"><center>SEMBUH</center></th>
                                            <th scope="col"><center>MENINGGAL</center></th>
                                            <th scope="col"><center>TANGGAL</center></th>
                                            <th scope="col"><center>ACTION</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no=1;
                                    @endphp
                                    @foreach($tracking as $data)

                                        <tr>
                                            <th scope="row"><center>{{$no++}}</center></th>
                                            <td><center>KELURAHAN : {{$data->rw->kelurahan->nama_kelurahan}}<br>
                                            KECAMATAN : {{$data->rw->kelurahan->kecamatan->nama_kecamatan}}<br>
                                            KOTA : {{$data->rw->kelurahan->kecamatan->kota->nama_kota}}<br>
                                            PROVINSI : {{$data->rw->kelurahan->kecamatan->kota->provinsi->nama_provinsi}}</center></td>
                                            <td><center>{{$data->rw->nama_rw}}</center></td>
                                            <td><center>{{$data->reaktif}}</center></td>
                                            <td><center>{{$data->positif}}</center></td>
                                            <td><center>{{$data->sembuh}}</center></td>
                                            <td><center>{{$data->meninggal}}</center></td>
                                            <td><center>{{$data->tanggal}}</center></td>
                                            <td>
                                            <form action="{{route('tracking.destroy',$data->id)}}"  method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <center>
                                            <a href="{{route('tracking.edit',$data->id)}}" class="btn btn-success">EDIT<i></a></i>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Hapus?')">DELETE<i>
                                            </form>
                                        </tr>
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