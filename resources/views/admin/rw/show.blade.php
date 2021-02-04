@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><br>
                SHOW
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>NAMA RW</label>
                        <input type="text" name="nama_rw" value="{{$rw->nama_rw}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                        <label>NAMA KELURAHAN</label>
                        <input type="text" class="form-control" value="{{$rw->kelurahan->nama_kelurahan}}" readonly>
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