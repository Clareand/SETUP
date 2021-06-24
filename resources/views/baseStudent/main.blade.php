<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <meta name="author" content="SETUP">
  <title>SETUP Dashboard</title>
  <!-- Favicon -->
  <link rel="icon" href="{{url('assets/img/brand/s.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{url('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{url('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Page plugins -->
  <link rel="stylesheet" href="{{url('assets/vendor/select2/dist/css/select2.min.css')}}">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{url('assets/css/argon.css')}}" type="text/css">
  <link rel="stylesheet" href="{{url('assets/css/style.css')}}" type="text/css">
  {{-- <link rel="stylesheet" href="{{url('assets/css/mdb.min.css')}}" type="text/css"> --}}
  
</head>

<body style="background-color: #FAFAFA !important">
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          {{-- ini nanti buat se --}}
          <div class="img">
            <img src="{{url('assets/img/brand/setup-gray.png')}}" alt="">
          </div>
          <ul class="navbar-nav align-items-left">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="text-default text-md">
                    Program
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <i class="fa fa-chevron-down"></i>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-bottom wider ">
                <div class="row dropdown-margin-2">
                  <div class="col-lg-12 col-divider">
                    <a href="{{url('app/list')}}" class="dropdown-item">
                      <div class="row">
                        <div class="col-sm-3 top">
                          <i class="ni ni-single-02 font-16"></i>
                        </div>
                        <div class="col-sm-8">
                          <div class="row">
                            <span class="text-md">
                              Class
                            </span>
                          </div>
                          <div class="row">
                            <span class="text-gray">Daftar pilihan kelas</span>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="col-lg-12 col-divider">
                    <a href="{{url('app/homepage')}}" class="dropdown-item">
                      <div class="row">
                        <div class="col-sm-3 top">
                          <i class="ni ni-bullet-list-67 font-16"></i>
                        </div>
                        <div class="col-sm-8">
                          <div class="row">
                            <span class="text-md">
                              Learning Path
                            </span>
                          </div>
                          <div class="row">
                            <span class="text-gray">Daftar Alur Belajar</span>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </li>
          </ul>
          <!-- Navbar links -->
          @if (Auth::user()&&Auth::user()->id_role==2) 
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" aria-haspopup="true" aria-expanded="false">
                  <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                      <img alt="Image placeholder" src="{{url('assets/img/theme/team-4.jpg')}}">
                    </span>
                    <div class="media-body  ml-2  d-none d-lg-block">
                      <span class="mb-0 text-md">{{Auth::user()->name}}</span>
                    </div>
                  </div>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="media align-items-center">
                    <span>
                        <i class="fa fa-chevron-down"></i>
                    </span>
                  </div>
                </a>      
                <div class="dropdown-menu  dropdown-menu-right wider">
                  <div class="row dropdown-margin-1">
                      <div class="col-sm-6">
                        <span class="mb-0 text-sm">Hi, {{Auth::user()->name}}</span>
                      </div>
                      <div class="col-sm-6 text-right">
                        <span class="mb-0 text-sm text-right">{{Session::get('point')}} Points</span>
                      </div>
                  </div> 
                  <div class="dropdown-divider centered"></div> 
                  <div class="row dropdown-margin-2">
                      <div class="col-md-8">
                        <a href="{{url('app/profile/'.Auth::user()->id)}}" class="text-default">
                          <i class="ni ni-single-02"></i>
                          <span>My profile</span>
                        </a>
                      </div>
                      <div class="col-md-4">
                        <a href="{{url('logout')}}" class="text-default">
                          <i class="fa fa-sign-out-alt"></i>
                          <span>Logout</span>
                        </a>
                      </div>
                  </div>
                  <div class="row dropdown-margin-2">
                    <div class="col-md-6">
                      <a href="{{url('app/class/history')}}" class="text-default">
                        <i class="fa fa-history"></i>
                        <span>Class History</span>
                      </a>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown">
                <div class="nav-link pr-0">
                  <div class="media align-items-center">
                    <span>
                        <a href="{{url('app/leaderboard')}}" class="btn btn-olive">Leaderboard</a>
                    </span>
                  </div>
                </div>
              </li>
            </ul>
            @else 
            <ul class="navbar-nav align-items-center  ml-md-auto ">
                <li class="nav-item dropdown">
                  <div class="nav-link pr-0">
                    <div class="media align-items-center">
                      <span>
                          <a href="{{route('login')}}" class="btn btn-default">Sign in</a>
                      </span>
                    </div>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <div class="nav-link pr-0">
                    <div class="media align-items-center">
                      <span>
                          <a href="{{route('register')}}" class="btn btn-olive">Sign up</a>
                      </span>
                    </div>
                  </div>
                </li>
              </ul>
            @endif
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
              {{-- apapun --}}
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    @yield('header')
    <div class="container-fluid mt--6">
      <!-- tets -->
      @yield('content')
      <!-- Footer -->
      <br>
      <footer class="footer pt-0" style="background-color: #FAFAFA">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-12">
            <div class="copyright text-center text-gray">
            2020 SETUP
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{url('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('assets/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{url('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{url('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <!-- Optional JS -->
  <script src="{{url('assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{url('assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
  <script src="{{url('assets/vendor/select2/dist/js/select2.min.js')}}"></script>
  <script src="{{url('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{url('assets/vendor/moment.min.js')}}"></script>
  <script src="{{url('assets/vendor/bootstrap-datetimepicker.js')}}"></script>
  <script src="{{url('assets/vendor/nouislider/distribute/nouislider.min.js')}}"></script>
  <script src="{{url('assets/vendor/quill/dist/quill.min.js')}}"></script>
  <script src="{{url('assets/vendor/dropzone/dist/min/dropzone.min.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{url('assets/js/argon.js?v=1.2.0')}}"></script>
  <script src="{{url('assets/js/demo.min.js')}}"></script>
  <script type="text/javascript">
    $(function() {
      $('#datetimepicker1').datetimepicker({
        icons: {
          time: "fa fa-clock",
          date: "fa fa-calendar-day",
          up: "fa fa-chevron-up",
          down: "fa fa-chevron-down",
          previous: 'fa fa-chevron-left',
          next: 'fa fa-chevron-right',
          today: 'fa fa-screenshot',
          clear: 'fa fa-trash',
          close: 'fa fa-remove'
        }
      });
    });
  </script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('select').select2();
});
  </script>
  @yield('custom-script')
</body>

</html>
