<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Android <sup>TV</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    {{-- <li class="nav-item {{ (request()->route()->getName() == 'dashboard')?'active':'' }}">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
  



 
    <!-- Nav Item - Charts -->
    <li class="nav-item {{ (request()->route()->getName() == 'dashboard.ads.index')?'active':'' }}">
        <a class="nav-link" href="{{route('dashboard.ads.index')}}">
            <i class="fas fa-money-check-alt"></i>
            <span>Ads</span></a>
    </li>
    <li class="nav-item {{ (request()->route()->getName() == 'dashboard.archive.index')?'active':'' }}">
        <a class="nav-link" href="{{route('dashboard.archive.index')}}">
            <i class="fas fa-trash-restore"></i>
            <span>Archive</span></a>
    </li>

  
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
   

</ul>