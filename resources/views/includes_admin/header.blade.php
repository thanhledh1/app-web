<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
    <a class="navbar-brand brand-logo" href="../../index.html">
      <img src="{{ asset('admin/images/logo.svg')}}" alt="logo" /> </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center">

    <form class="ml-auto search-form d-none d-md-block" action="#">
      <div class="form-group">
        <input type="search" class="form-control" placeholder="Search Here">
      </div>
    </form>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <img class="img-md rounded-circle" src="{{ asset('admin/uploads/user/'.Auth::user()->image) }}" alt="Profile image">
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <div class="dropdown-header text-center">
            <img class="img-md rounded-circle" src="{{ asset('admin/uploads/user/'.Auth::user()->image) }}" alt="Profile image">

            <span class="nav-profile-name">{{ Auth()->guard('web')->user()->name }}</span>

            <p class="font-weight-light text-muted mb-0">{{ Auth()->guard('web')->user()->email }}</p>
          </div>
          <a class="dropdown-item" href="{{ route('users.show', [Auth()->guard('web')->user()->id]) }}">My Profile <span class="badge badge-pill badge-danger">1</span><i class="dropdown-item-icon ti-dashboard"></i></a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Sign Out<i class="dropdown-item-icon ti-power-off"></i>
          </a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>