<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main">
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <!-- Menu Utama (Hanya Ikon Garis 3) -->
      <li class="nav-item">
        <a data-bs-toggle="collapse" href="#menuUtama" class="nav-link" aria-controls="menuUtama" role="button" aria-expanded="false">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <!-- Ikon Garis 3 untuk Menu Utama -->
            <i class="fas fa-bars text-primary" aria-hidden="true"></i>
          </div>
        </a>
        <div class="collapse" id="menuUtama">
          <ul class="nav ms-4 ps-3">
            <!-- Submenu Dashboard -->
            <li class="nav-item">
              <a class="nav-link {{ (Request::is('dashboard') ? 'active' : '') }}" href="{{ url('dashboard') }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                  <!-- Ikon untuk Dashboard -->
                  <i class="ni ni-tv-2 text-info" aria-hidden="true"></i>
                </div>
                <span class="nav-link-text ms-1">Dashboard</span>
              </a>
            </li>
            <!-- Submenu CCTV -->
            <li class="nav-item">
              <a class="nav-link {{ (Request::is('cctv') ? 'active' : '') }}" href="{{ url('cctv') }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                  <!-- Ikon untuk CCTV -->
                  <i class="ni ni-camera-compact text-warning" aria-hidden="true"></i>
                </div>
                <span class="nav-link-text ms-1">CCTV</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</aside>
