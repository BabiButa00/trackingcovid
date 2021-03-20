<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{asset('assets/dist/img/ligi.jfif')}}">
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

<?php
           $datapositif = file_get_contents("https://api.kawalcorona.com/positif");
           $positif = json_decode($datapositif, TRUE);
           $datasembuh = file_get_contents("https://api.kawalcorona.com/sembuh");
           $sembuh = json_decode($datasembuh, TRUE);
           $datameninggal = file_get_contents("https://api.kawalcorona.com/meninggal");
           $meninggal = json_decode($datameninggal, TRUE);
           $dataid = file_get_contents("https://api.kawalcorona.com/indonesia");
           $id = json_decode($dataid, TRUE);
           $dataidprovinsi = file_get_contents("https://api.kawalcorona.com/indonesia/provinsi");
           $idprovinsi = json_decode($dataidprovinsi, TRUE);
        $datadunia= file_get_contents("https://api.kawalcorona.com/");
        $dunia = json_decode($datadunia, TRUE);
    ?>
<div class="wrapper">

        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" >KAWAL<b>CORONA</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="{{url('trackingcvd')}}">Beranda</a>
        <a class="nav-link" href="#">Informasi</a>
        <a class="nav-link" href="#">Contact</a>
        <a class="nav-link" href="#">API</a>
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
      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <h2 class="mb-0 number-font"><?php echo $positif['value'] ?></h2>
              <BR>
                <p>TERKONFIRMASI</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>  
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h2 class="mb-0 number-font"><?php echo $sembuh['value'] ?></h2>
              <BR>
                <p>SEMBUH</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h2 class="mb-0 number-font"><?php echo $meninggal['value'] ?></h2>
                <BR>
                <p>MENINGGAL</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-orange">
              <div class="inner">
              <h2>INDONESIA</h2>
              <BR>
                <p class="mb-2 number-font">&nbsp; Positif <?php echo $id[0]['positif'] ?> &nbsp; &nbsp; Sembuh <?php echo $id[0]['sembuh'] ?> &nbsp; &nbsp; Meninggal <?php echo $id[0]['meninggal'] ?> &nbsp;</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <BR></BR>

        <div class="row">
     <div class="col-sm">
      <div class="card">
            <div class="card-header ">
                    <h3 class="card-title">Data Kasus Corona Virus Di Dunia</h3>
                    </div>
                     <div class="card-body" >
                         <div style="height:600px;overflow:auto;margin-right:15px;">
                                 <table class="table table-striped"  fixed-header  >
                                 <thead>
                                     <tr>
                                     <th scope="col">No</th>
                                     <th scope="col">Negara</th>
                                     <th scope="col">Positif</th>
                                     <th scope="col">Sembuh</th>
                                     <th scope="col">Meninggal</th>
                                     </tr>
                                 </thead>
                                 <tbody>
             
                                 @php
                                     $no = 1;    
                                 @endphp
                                 <?php
                                     for ($i= 0; $i <= 23; $i++){
             
                                     
                                     ?>
                                 <tr>
                                     <td> <?php echo $i+1 ?></td>
                                     <td> <?php echo $dunia[$i]['attributes']['Country_Region'] ?></td>
                                     <td> <?php echo $dunia[$i]['attributes']['Confirmed'] ?></td>
                                     <td><?php echo $dunia[$i]['attributes']['Recovered']?></td>
                                     <td><?php echo $dunia[$i]['attributes']['Deaths']?></td>
                                 </tr>
                                     <?php 
                                 
                                 } ?>
                                 </tbody>
                                 </table>       
                     </div>
                   </div>
                  </div>


                  <div class="card-header ">
       <h3 class="card-title">Data Kasus Corona Virus di Indonesia Berdasarkan Provinsi</h3>
       </div>
        <div class="card-body" >
            <div style="height:600px;overflow:auto;margin-right:15px;">
            <table class="table table-striped"  fixed-header  >
                    <thead>
                                            <tr>
                                                <th>NO.</th>
                                                <th>KODE PROVINSI</th>
                                                <th>PROVINSI</th>
                                                <th>POSITIF</th>
                                                <th>SEMBUH</th>
                                                <th>MENINGGAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $no=1; @endphp
                                        @foreach ($provinsi as $data)
                                        <tr>
                                            <th>{{$no++}}</th>
                                            <th>{{$data->kode_provinsi}}
                                            <th>{{$data->nama_provinsi}}
                                            <th>{{$data->positif}}
                                            <th>{{$data->sembuh}}
                                            <th>{{$data->meninggal}}  
                                        </tr>
                                        @endforeach
                                    </tbody>
                    </table>
                   
                   
                  
        </div>
      </div>
     </div>
                   <BR></BR>
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