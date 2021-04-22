<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{asset('assets/dist/img/logo.jfif')}}">
  <title>Tracking COVID-19</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('assets/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" >KAWAL<b>CORONA</b></a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">BERANDA</a>
        <a class="nav-link active" aria-current="page" href="{{ url('/kontak') }}">KONTAK</a>
        <a class="nav-link" href="{{ url('api/global') }}">API</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/login') }}">LOGIN FOR DEVELOPERS</a>
            </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<BR>

<center>
    <div class="container-fluid">
            <h1><b>KAWAL CORONA</b></h1>
            <h6>Corona Virus Global & Indonesia Live Data</h6>
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

        <div class="card-header ">
            &nbsp;
  <section class="showcase">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-1"></div>
      <div class="col-lg-10">
        <div class="card">
        <section id="kasusdunia" class="kasusdunia"><center>
          <div class="card-header">DATA KASUS CORONA VIRUS BERDASARKAN NEGARA</div></center>
          <div class="card-body">
            <div style="height:600px;overflow:auto;margin-right:15px;">
            <table class="table table-striped">
                     <div class="card-body" >
                     <thead>
                                            <tr>
                                                <th>NO.</th>
                                                <th>NEGARA</th>
                                                <th>POSITIF</th>
                                                <th>SEMBUH</th>
                                                <th>MENINGGAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $no = 1;
                                          @endphp
                                            @foreach($dunia as $data)
                                                <tr>     
                                                  <th>{{$no++ }}</th>
                                                  <th> <?php echo $data['attributes']['Country_Region'] ?></th>
                                                  <th> <?php echo number_format($data['attributes']['Confirmed']) ?></th>
                                                  <th> <?php echo number_format($data['attributes']['Recovered']) ?></th>
                                                  <th> <?php echo number_format($data['attributes']['Deaths']) ?></th>
                                                </tr>
                                              @endforeach
                                 </tbody>
                                 </table>
                                
                        </div>   
                     </div>
                   </div>
                </section>


                  <div class="card-header ">
&nbsp;
  <section class="showcase">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-1"></div>
      <div class="col-lg-10">
        <div class="card">
        <section id="kasusindonesia" class="kasusindonesia"><center>
          <div class="card-header">DATA KASUS CORONA VIRUS BERDASARKAN PROVINSI</div></center>
          <div class="card-body">
            <div style="height:600px;overflow:auto;margin-right:15px;">
            <table class="table table-striped">
            <div class="card-body" >
              <thead>
              <tr>
                <th>NO.</th>
                <th>PROVINSI</th>
                <th>POSITIF</th>
                <th>SEMBUH</th>
                <th>MENINGGAL</th>
                </tr>
              </thead>
              <tbody>
              @php $no=1; @endphp
                                            @foreach($tampil as $data)
                                   
                                        <tr>
                                            <th>{{$no++ }}</th>
                                            <th>{{$data->nama_provinsi}}</th>
                                            <th>{{number_format($data->Positif)}}</th>
                                            <th>{{number_format($data->Sembuh)}}</th>
                                            <th>{{number_format($data->Meninggal)}}</th>
                                        </tr>
                @endforeach
                
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
<BR></BR>

                <div class="container-fluid">
                  <center><h2><b><h2> BERITA TERKINI SEPUTAR COVID-19 </h2></b></h2></center>
                </div>
                   <BR></BR>
                   <div class="row">
                     <div class="col-md-12 col-xl-6">
                       <a href="https://www.unicef.org/indonesia/id/coronavirus">
                        <div class="card text-white bg-primary">
                          <div class="card-body">
                            <h4 class="card-title">Novel coronavirus (COVID-19):Hal-hal yang perlu Anda ketahui</h4>
                            <p class="card-text">Unicef Indonesia</p>
                          </div>
                        </div>
                      </a>
                     </div>

                    <div class="col-md-12 col-xl-6">
								      <a href="https://www.kompas.com/tren/read/2020/03/03/183500265/infografik-daftar-100-rumah-sakit-rujukan-penanganan-virus-corona">
								        <div class="card text-white bg-secondary">
									        <div class="card-body">
										        <h4 class="card-title">Daftar 100 Rumah Sakit Rujukan Penanganan Virus Corona</h4>
										        <p class="card-text">Kompas</p>
									        </div>
								        </div>
							        </a>
                    </div>

                  <div class="col-md-12 col-xl-6">
								    <a href="https://infeksiemerging.kemkes.go.id/">
								      <div class="card text-white bg-success">
									      <div class="card-body">
										      <h4 class="card-title">Media Informasi Resmi Penyakit Infeksi Emerging</h4>
										      <p class="card-text">Kementrian Kesehatan </p>
									      </div>
								      </div>
						      	</a>
                  </div>

                     <div class="col-md-12 col-xl-6">
                       <a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public">
                        <div class="card text-white bg-danger">
                          <div class="card-body">
                            <h4 class="card-title">Coronavirus Disease (COVID-19) Advice for The Public</h4>
                            <p class="card-text">WHO</p>
                          </div>
                        </div>
                      </a>
                     </div>
                   </div>
<BR></BR>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js')}}/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS')}} -->
<script src="{{asset('assets/plugins/chart.js')}}/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('assets/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets/plugins/tempusdominus-bootstrap-4/js')}}/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('assets/plugins/overlayScrollbars/js')}}/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js')}}/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js')}}/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('assets/dist/js')}}/pages/dashboard.js')}}"></script>
</body>
</html> 