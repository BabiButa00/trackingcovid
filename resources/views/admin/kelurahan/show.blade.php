@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><br>
                SHOW
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>NAMA KELURAHAN</label>
                        <input type="text" name="nama_kelurahan" value="{{$desa->nama_kelurahan}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                        <div class="form-group">
                        <label>NAMA KECAMATAN</label>
                        <input type="text" class="form-control" value="{{$desa->kecamatan->nama_kecamatan}}" readonly>
                    </select>
                </div>
                    <div class="form-group">
                 <a href="{{url()->previous()}}" class="btn btn-primary">KEMBALI</a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection