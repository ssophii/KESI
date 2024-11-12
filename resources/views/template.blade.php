<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIKES</title>
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css') }}" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/ti-icons/css/themify-icons.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('js/select.dataTables.min.css') }}"> --}}
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}">
</head>
<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
          <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="{{ asset('assets/images/ercom.png') }}" class="mr-2" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('assets/images/ercom-mini.png') }}" alt="logo"/></a>
          </div>
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
            <ul class="navbar-nav mr-lg-2">
              <li class="nav-item nav-search d-none d-lg-block">
                <div class="input-group">
                  <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                    <span class="input-group-text" id="search">
                      <i class="icon-search"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
                </div>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="icon-bell mx-0"></i>
                  <span class="count"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-success">
                        <i class="ti-info-alt mx-0"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <h6 class="preview-subject font-weight-normal">Application Error</h6>
                      <p class="font-weight-light small-text mb-0 text-muted">
                        Just now
                      </p>
                    </div>
                  </a>
                </div>
              </li>
              <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                  <i class="fa-brands fa-github-alt"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item">
                    <i class="ti-settings text-primary"></i>
                    Settings
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="#"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                     <i class="ti-power-off text-primary"></i>
                    <span>Log Out</span>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </div>
              </li>
            </ul>
          </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
          <!-- partial -->
          <!-- partial:partials/_sidebar.html -->
          
          <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
              <?php
                  $max = is_countable($menu) ? count($menu) : 0; // Tambahkan pemeriksaan untuk memastikan $menu dapat dihitung
                  $i = 0;
              ?>
              
              <?php foreach ($menu as $key => $value) : ?>
                  <?php if($title == $value->title) $active = 'active'; else $active = '';?>
                  <li class="nav-item {{ $active }}">
                      <a class="nav-link" href="{{ route($value->role . '.' . $value->link) }}">
                          <i class="{{ $value->icon }} menu-icon"></i>
                          {{-- <i class="{{ $value->icon }} menu-icon"></i> --}}
                          <span class="menu-title">{{ $value->title }}</span>
                      </a>
                  </li>
                  <?php $i++; ?>
              <?php endforeach ?>
          </ul>
          
          </nav>
          <!-- partial -->
          <div class="main-panel">
            <div class="content-wrapper">
              <div class="row">
                <div class="col-md-12 grid-margin">
                  <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                      <?php foreach ($menu as $key => $value) : ?>
                        <h3 class="font-weight-bold">Welcome {{ $value->name }}</h3>
                      <?php endforeach ?>
                      {{-- <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6> --}}
                    </div>
                  </div>
                </div>
              </div>
            {{-- <div class="row"> --}}
                <main class="flex-1">
                    {{-- <div class="container mx-auto p-4"> --}}
                        @yield('content')
                    {{-- </div> --}}
                </main>    
            {{-- </div> --}}
              
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Engineering Research Community 2024</span> 
              </div>
            </footer> 
            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>   
        <!-- page-body-wrapper ends -->
      </div>

    {{-- <div class="min-h-screen flex flex-col">
        <header class="bg-dark">
            <nav class="container mx-auto p-4 flex justify-between">
                <a href="#" class="text-white text-xl font-bold">admin</a>
                
            </nav>
        </header>
    
        
    </div> --}}
    
    {{-- <aside class="fixed left-0 top-0 h-screen w-64 bg-light p-4">
        <ul>
            <li><a href="{{ route('admin.index') }}" class="block p-2 hover:bg-light">Dashboard</a></li>
            <li><a href="#" class="block p-2 hover:bg-light">Pengeluaran</a></li>
        </ul>
    </aside> --}}
  <!-- plugins:js -->
  <script src="{{ asset('assets/vendor/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/vendor/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('assets/js/dataTables.select.min.js') }}"></script>
  <script>
    const csrfToken = '{{ csrf_token() }}';
  </script>
  <script src="{{ asset('assets/js/modal.js') }}"></script>


  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
  <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('assets/js/template.js') }}"></script>
  <script src="{{ asset('assets/js/settings.js') }}"></script>
  <script src="{{ asset('assets/js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('assets/js/Chart.roundedBarCharts.js') }}"></script>
  <!-- End custom js for this page-->
</body>
</html>

