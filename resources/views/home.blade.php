@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <center><div class="card-header">{{ __('ANDA BERHASIL LOGIN !!!') }}</div></center>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <center>{{ __('SELAMAT DATANG DI WEB TRACKING COVID') }}</center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
