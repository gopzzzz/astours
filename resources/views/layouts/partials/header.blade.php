@php 
 $userId = auth()->id();
 $user = DB::table('users')
    ->where('id', $userId)
    ->first();
    $role=$user->role;

$bookingCount = DB::table('bookingmasters')
    ->leftJoin('tours', 'bookingmasters.tour_id', '=', 'tours.id');

if ($role != 1) {

    $staffid = DB::table('staff_registrations')
        ->where('user_id', $userId)
        ->value('id');

    $bookingCount->where('tours.staff_id', $staffid);
}

$bookingCount = $bookingCount
    ->where('bookingmasters.booking_status', '0')
    ->count();


@endphp

<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
     
      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
       -->
      <span class="brand-text font-weight-light">PANDAVAS TOURS ADMIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
       <li class="nav-item">
    <a href="{{ route('dashboard') }}"
       class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
    </a>
</li>
         
         
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/uplot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>uPlot</p>
                </a>
              </li>
            </ul>
          </li> -->

          @if($role==1)


        <li class="nav-item">
    <a href="{{ route('departments.index') }}"
       class="nav-link {{ request()->routeIs('departments.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-building"></i>
        <p>Departments</p>
    </a>
</li>

 <li class="nav-item">
    <a href="{{ route('addons.index') }}"
       class="nav-link {{ request()->routeIs('addons.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-building"></i>
        <p>Addons</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('staff_registrations.index') }}"
       class="nav-link {{ request()->routeIs('staff_registrations.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-tie"></i>
        <p>Staff Registrations</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('tours.index') }}"
       class="nav-link {{ request()->routeIs('tours.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-route"></i>
        <p>Tours</p>
    </a>
</li>




@endif

<li class="nav-item">
    <a href="{{ route('bookings.list') }}"
       class="nav-link {{ request()->routeIs('bookings.*') ? 'active' : '' }}">

        <i class="nav-icon fas fa-route"></i>

        <p>
            Bookings

            @if($bookingCount > 0)
                <span class="right badge badge-danger">
                    {{ $bookingCount }}
                </span>
            @endif
        </p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('blogs.index') }}"
       class="nav-link {{ request()->routeIs('blogs.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-blog"></i>
        <p>Reviews</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('uploads.index') }}"
       class="nav-link {{ request()->routeIs('uploads.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-images"></i>
        <p>Uploads</p>
    </a>
</li>
@if($role==1)

<li class="nav-item">
    <a href="{{ route('revenue_reports.index') }}"
       class="nav-link {{ request()->routeIs('revenue_reports.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-chart-line"></i>
        <p>Revenue Reports</p>
    </a>
</li>

<!-- BANNERS -->
<li class="nav-item">
    <a href="{{ route('banners.index') }}"
       class="nav-link {{ request()->routeIs('banners.*') ? 'active' : '' }}">

        <i class="nav-icon fas fa-bullhorn"></i>

        <p>Banners</p>

    </a>
</li>

@endif


<li class="nav-item">

    <a href="{{ route('banners.index') }}"
       class="nav-link">

        <i class="nav-icon fas fa-bullhorn"></i>
        <p>Banners</p>

    </a>

</li>




<!-- ENQUIRIES -->
<li class="nav-item">
    <a href="{{ route('enquiries.index') }}"
       class="nav-link {{ request()->routeIs('enquiries.*') ? 'active' : '' }}">

        <i class="nav-icon fas fa-envelope"></i>

        <p>Enquiries</p>

    </a>
</li>
@if($role==1)

<!-- CUSTOMERS -->
<li class="nav-item">
    <a href="{{ route('customers.index') }}"
       class="nav-link {{ request()->routeIs('customers.*') ? 'active' : '' }}">

        <i class="nav-icon fas fa-users"></i>

        <p>Customers</p>

    </a>
</li>
@endif


<li class="nav-item">
    <a href="{{ route('customers.index') }}" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>Customers</p>
    </a>
</li>


<li class="nav-item">

    <a href="{{ route('enquiries.index') }}"
       class="nav-link">

        <i class="nav-icon fas fa-envelope"></i>

        <p>
            Enquiries
        </p>

    </a>

</li>
















          <li class="nav-item">
    <a href="{{ route('logout') }}" class="nav-link">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>Logout</p>
    </a>
</li>
         
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

