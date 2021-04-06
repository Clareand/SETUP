<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{url('assets/img/brand/setup-gray.png')}}" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link @yield('dashboard-active')" href="examples/dashboard.html">
                  <i class="ni ni-tv-2 text-primary"></i>
                  <span class="nav-link-text">Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
              <a class="nav-link @yield('user-active') olive" href="#navbar-user" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                <i class="ni ni-single-02 text-primary"></i>
                <span class="nav-link-text">User</span>
              </a>
              <div class="collapse @yield('user-collapse')" id="navbar-user">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item @yield('admin-active')">
                    <a href="{{url ('/admin/list')}}" class="nav-link">
                      <span class="sidenav-normal"> Admin </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/dashboards/alternative.html" class="nav-link">
                      <span class="sidenav-normal"> Student </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('class_active')" href="#navbar-class" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                  <i class="ni ni-collection text-primary"></i>
                  <span class="nav-link-text">Class</span>
                </a>
                <div class="collapse @yield('class_collapse')" id="navbar-class">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a href="../../pages/dashboards/dashboard.html" class="nav-link">
                        <span class="sidenav-normal"> Class List </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../../pages/dashboards/alternative.html" class="nav-link">
                        <span class="sidenav-normal"> Module </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../../pages/dashboards/alternative.html" class="nav-link">
                        <span class="sidenav-normal"> Task </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            <li class="nav-item">
                <a class="nav-link @yield('learning_active')" href="examples/icons.html">
                  <i class="ni ni-spaceship text-orange"></i>
                  <span class="nav-link-text">Learning Path</span>
                </a>
              </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>