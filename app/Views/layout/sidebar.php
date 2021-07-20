  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Resto Jasuke</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Pak Resto</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/" class="nav-link <?= ($title == 'Beranda') ? "active" : ""; ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/menu" class="nav-link <?= ($title == 'Menu') ? "active" : ""; ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Menu
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/pemesanan" class="nav-link <?= ($title == 'Pemesanan') ? "active" : ""; ?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Pemesanan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/pembayaran" class="nav-link <?= ($title == 'Pembayaran') ? "active" : ""; ?>">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Pembayaran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/laporan" class="nav-link <?= ($title == 'Pelaporan') ? "active" : ""; ?>">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Pelaporan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>