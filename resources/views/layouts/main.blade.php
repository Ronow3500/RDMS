<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>{{ config('app.name', $company_name ?? '') }} | {{ $title ?? '' }} </title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('./assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('./assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('./assets/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('/assets/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css ') }}">
  <link rel="stylesheet" href="{{ asset('/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css ') }}">
  <link rel="stylesheet" href="{{ asset('/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css ') }}">
  <!--Favicon-->
  <link rel="shortcut icon" type="image/jpg" href="{{ asset('./assets/images/favicon.jpeg') }}"/>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-primary"> 

     <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item bg-light d-none d-sm-inline-block">
        <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
        <form method="post" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-default btn-sm">
            <span class="fas fa-arrow-right"></span>
            Logout
          </button>
        </form>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
    
  </nav>
  <!-- /.navbar -->

<!-- Include Sidebar Here -->
   @include('partials.sidebar')
<!-- End of Sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ $header ?? '' }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Respondents</a></li>
              <li class="breadcrumb-item active">{{ $header ?? '' }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        @include('partials.alerts')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

   @yield('content')
    
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?= date('Y'); ?> <a class="text-warning" href="http://tifaresearch.com/">{{ $company_name ?? '' }}</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      @env('production')
        <a href="kennethkipchumba.com" target="_blank">
         <strong>Support ?</strong>
       </a>
      @elseenv('local')
       <b>Laravel Version</b> {{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
      @endenv
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('./assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('./assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('./assets/plugins/select2/js/select2.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('./assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('./assets/dist/js/adminlte.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('./assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('./assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('./assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('./assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('./assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('./assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('./assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('./assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('./assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('./assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('./assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('./assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('./assets/dist/js/demo.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('./assets/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('./assets/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('./assets/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('./assets/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('./assets/plugins/chart.js/Chart.min.js') }}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{ asset('./assets/dist/js/pages/dashboard2.js') }}"></script>

<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datatables
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "colvis"],
      "paging": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  })
</script>
</body>
</html>
