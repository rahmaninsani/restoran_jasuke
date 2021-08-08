  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link text-center">
      <!-- <img src="/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-bold">Resto UNIKOM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">  
          <a href="#" class="d-block"><?= session()->get('nama'); ?> | <?= session()->get('jabatan'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/" class="nav-link <?= (strpos($title, 'Beranda') !== false) ? "active" : ""; ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>

          <?php if(! is_kasir()) : ?>
            <li class="nav-item">
              <a href="/menu" class="nav-link <?= (strpos($title, 'Menu') !== false) ? "active" : ""; ?>">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Menu
                </p>
              </a>
            </li>
          <?php endif ?>

          <?php if(! is_koki()) : ?>
            <li class="nav-item">
              <a href="/meja" class="nav-link <?= (strpos($title, 'Meja') !== false) ? "active" : ""; ?>">
                <i class="nav-icon fas fa-chair"></i>
                <p>
                  Meja
                </p>
              </a>
            </li>
          <?php endif; ?>

          <?php if(! is_kasir()) : ?>
            <li class="nav-item">
              <a href="/pemesanan" class="nav-link <?= (strpos($title, 'Pemesanan') !== false) ? "active" : ""; ?>">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  Pemesanan
                </p>
              </a>
            </li>
          <?php endif ?>

          <?php if(is_kasir()) : ?>
            <li class="nav-item">
              <a href="/pembayaran" class="nav-link <?= ((strpos($title, 'Pembayaran') !== false) || ($title == 'Detail Pemesanan')) ? "active" : ""; ?>">
                <i class="nav-icon fas fa-money-bill"></i>
                <p>
                  Pembayaran
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/pelaporan" class="nav-link <?= (strpos($title, 'Pelaporan') !== false) ? "active" : ""; ?>">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Pelaporan
                </p>
              </a>
            </li>
          <?php endif; ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>