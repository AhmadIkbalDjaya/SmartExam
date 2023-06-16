@push('style')
  <link rel="stylesheet" href="{{ asset('/css/navbar.css') }}">
@endpush


<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<header class="topbar" data-navbarbg="skin6" style="position: fixed; width: 100%">
  <nav class="navbar top-navbar navbar-expand-md navbar-dark">
    <div class="navbar-header" data-logobg="skin6">
      {{-- logo --}}
      <a class="navbar-brand card-header" href="{{ route('admin.home.index') }}">
        <b class="logo-icon">
          <img src="{{ asset('/images/logo.png') }}" alt="homepage" height="60px" />
        </b>
        <span class="logo-text text-dark pt-2 w-100">
          <h3>Siswa</h3>
        </span>

      </a>
      {{-- Toggle --}}
      <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)">
        <svg>
          <defs>
            <filter id="gooeyness">
              <feGaussianBlur in="SourceGraphic" stdDeviation="2.2" result="blur" />
              <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 20 -10"
                result="gooeyness" />
              <feComposite in="SourceGraphic" in2="gooeyness" operator="atop" />
            </filter>
          </defs>
        </svg>
        <div class="plates">
          <div class="plate plate1" onclick="this.classList.toggle('active')">
            <svg class="burger" version="1.1" height="100" width="100" viewBox="0 0 100 100">
              <path class="line line1" d="M 30,65 H 70" />
              <path class="line line2"
                d="M 70,50 H 30 C 30,50 18.644068,50.320751 18.644068,36.016949 C 18.644068,21.712696 24.988973,6.5812347 38.79661,11.016949 C 52.604247,15.452663 46.423729,62.711864 46.423729,62.711864 L 50.423729,49.152542 L 50.423729,16.101695" />
              <path class="line line3"
                d="M 30,35 H 70 C 70,35 80.084746,36.737688 80.084746,25.423729 C 80.084746,19.599612 75.882239,9.3123528 64.711864,13.559322 C 53.541489,17.806291 54.423729,62.711864 54.423729,62.711864 L 50.423729,49.152542 V 16.101695" />
            </svg>
            <svg class="x" version="1.1" height="100" width="100" viewBox="0 0 100 100">
              <path class="line" d="M 34,32 L 66,68" />
              <path class="line" d="M 66,32 L 34,68" />
            </svg>
          </div>
        </div>
      </a>

    </div>
    {{-- Navbar Item --}}
    <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
      <ul class="navbar-nav me-auto mt-md-0">
        {{-- search --}}
        <li class="nav-item hidden-sm-down">
          <form class="app-search ps-3">
            <input type="text" class="form-control" placeholder="Search for..." /> <a class="srh-btn"><i
                class="ti-search"></i></a>
          </form>
        </li>
      </ul>
      {{-- Icon Admin / Logout --}}
      <ul class="navbar-nav">
        <li class="nav-item">
          <div class="btn-group">
            <button type="button" class="btn dropdown-toggle d-flex align-items-center text-white"
              data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
              <div class="bg-primary rounded-circle me-2 d-flex align-items-center justify-content-center icn-akun"
                style="height: 35px; width: 35px;">S</div>
            </button>
            <ul class="dropdown-menu dropdown-menu-end p-0">
              <li>
                <button class="dropdown-item" type="button">Logout</button>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6" style="position: fixed">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        <!-- User Profile-->
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('student.home.index') }}"
            aria-expanded="false"><i class="me-3 far fa-clock fa-fw" aria-hidden="true"></i><span
              class="hide-menu">Dashboard</span></a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('student.quiz.index') }}"
            aria-expanded="false"> <i class="me-3 fa fa-book-open" aria-hidden="true"></i><span
              class="hide-menu">Ujian CBT</span></a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('student.profile.index') }}"
            aria-expanded="false"> <i class="me-3 fa fa-user" aria-hidden="true"></i><span
              class="hide-menu">Profile</span></a>
        </li>
        <li class="text-center p-20 upgrade-btn">
          <a href="" class="btn btn-danger text-white mt-4" target="_blank">Logout</a>
        </li>
      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>
