<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Commerce | @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
  <link rel="stylesheet" href="http://127.0.0.1:8000/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="http://127.0.0.1:8000/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="http://127.0.0.1:8000/css/custom.css">
  <link rel="stylesheet" href="http://127.0.0.1:8000/css/style.css">
   <link rel="stylesheet" href="http://127.0.0.1:8000/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="http://127.0.0.1:8000/admin/dist/css/adminlte.min.css">
  
  
  <script src="http://127.0.0.1:8000/admin/plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script src="http://127.0.0.1:8000/js/custom.js"></script>
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
@include('manager.layouts.navigation')
@include('manager.layouts.sidebar')
@yield('content')
@include('manager.layouts.footer')

<script src="http://127.0.0.1:8000/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="http://127.0.0.1:8000/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="http://127.0.0.1:8000/admin/dist/js/adminlte.js"></script>

<script src="http://127.0.0.1:8000/admin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="http://127.0.0.1:8000/admin/plugins/raphael/raphael.min.js"></script>
<script src="http://127.0.0.1:8000/admin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
 
<!-- ChartJS -->
<script src="http://127.0.0.1:8000/admin/plugins/chart.js/Chart.min.js"></script>
</div>
</body>
</html>