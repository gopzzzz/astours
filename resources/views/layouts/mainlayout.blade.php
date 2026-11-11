<!DOCTYPE html>
<html lang="en">
@include('layouts.partials.head')
<body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

    @include('layouts.partials.header')
    <!-- /.content-header -->

    <!-- Main content -->

     @yield('content') 
   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
 @include('layouts.partials.footer')

</div>
<!-- ./wrapper -->
 @include('layouts.partials.footer-scripts')
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->

</body>
</html>
