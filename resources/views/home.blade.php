@extends('layouts.master')

@section('content')
<center>
    <div class="container-fluid">
            <h1><b>SELAMAT DATANG DI WEBSITE TRACKING COVID</b></h1>
            <h6>Anda telah berhasil login</h6>
    </div>
  </center>
<BR></BR>
    <div class="row">
  	  <div class="col-lg-0"></div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card bg-danger img-card box-primary-shadow">
         <div class="card-body">
          <div class="d-flex">
           <div class="text-white">
            <p class="text-white mb-0">TOTAL POSITIF</p>
            <h2 class="mb-0 number-font"><?php echo $posglobal['value'] ?></h2>
            <p class="text-white mb-0">ORANG</p>
           </div>
           <div class="ml-auto"> <img src="{{asset('assets/dist/img/sad-u6e.png')}}" width="50" height="50" alt="Positif"> </div>
          </div>
         </div>
        </div>
       </div><!-- COL END -->
       <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card bg-success img-card box-secondary-shadow">
         <div class="card-body">
          <div class="d-flex">
           <div class="text-white">
            <p class="text-white mb-0">TOTAL SEMBUH</p>
            <h2 class="mb-0 number-font"><?php echo $semglobal['value'] ?></h2>
            <p class="text-white mb-0">ORANG</p>
           </div>
           <div class="ml-auto"> <img src="{{asset('assets/dist/img/happy-ipM.png')}}" width="50" height="50" alt="Positif"> </div>
           <BR></BR>
          </div>
         </div>
        </div>
       </div><!-- COL END -->
       <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card  bg-secondary img-card box-success-shadow">
         <div class="card-body">
          <div class="d-flex">
           <div class="text-white">
            <p class="text-white mb-0">TOTAL MENINGGAL</p>
            <h2 class="mb-0 number-font"><?php echo $menglobal['value'] ?></h2>
            <p class="text-white mb-0">ORANG</p>
           </div>
           <div class="ml-auto"> <img src="{{asset('assets/dist/img/emoji-LWx.png')}}" width="50" height="50" alt="Positif"> </div>
          </div>
         </div>
        </div>
       </div><!-- COL END -->
       <div class="col-sm-20 col-md-10 col-lg-10 col-xl-3">
        <div class="card  bg-info img-card box-success-shadow">
         <div class="card-body">
          <div class="d-flex">
           <div class="text-white">
            <h2 class="text-white mb-0">INDONESIA</h2>
            </BR>
            <p class="mb-0 number-font"><b>{{$positif}}</b> POSITIF, <b>{{$sembuh}}</b> SEMBUH, <b>{{$meninggal}}</b> MENINGGAL </p>
           </div>
           <div class="ml-auto"> <img src="{{asset('assets/dist/img/indonesia-PZq.png')}}" width="50" height="50" alt="Positif"> </div>
          </div>
         </div>
        </div>
       </div><!-- COL END -->
     </div>
     <div class="col-lg-1"></div>
    </section><!-- End About Section -->
             <center><h6><br><p>Update terakhir : {{ $tanggal }}</p></h6></center>
                                    </div> 
        <BR></BR>
@endsection
