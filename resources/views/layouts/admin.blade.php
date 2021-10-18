
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--@yield('title')-->
  <title>Admin Panel</title>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('../vendor/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('../vendor/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('../vendor/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('../vendor/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('../vendor/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../vendor/dist/css/custom.css') }}">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <i class="nav-icon fas fa-user"></i>
            <span class="caret">{{auth()->user()->name}}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  <i class="nav-icon fas fa-sign-out-alt"></i> {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <i class="fas fa-user ml-3"></i> 
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('admin.main')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p></a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.users')}}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>Users Profile</p></a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.reported')}}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Report Listed</p></a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.blocked')}}" class="nav-link">
            <i class="nav-icon fas fa-box-open"></i>
            <p>Block Listed</p></a>
          </li>
          
          <hr>
          @guest @if (Route::has('login'))
          @endif @else
          <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <p>Logout</p></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
          @endguest
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Dashboard</h1>
          </div>
          
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      @yield('content')
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('../vendor/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('../vendor/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('../vendor/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('../vendor/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('../vendor/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('../vendor/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('../vendor/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('../vendor/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('../vendor/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('../vendor/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('../vendor/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('../vendor/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('../vendor/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('../vendor/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('../vendor/dist/js/adminlte.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  $(function () {
    $("#food_item").DataTable({
      "order":[[0,'desc']],
      "responsive": true, 
      "lengthChange": true, 
      "autoWidth": false,
      "lengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
    });
  });
</script>

</body>
</html>
