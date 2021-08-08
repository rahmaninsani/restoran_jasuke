<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <div class="row">
        <div class="col user-panel user-logout">
          <div class="image">
            <?php if(is_koki()) : ?>
              <img src="/assets/img/resto/koki.png" class="img-circle elevation-2" alt="Foto Koki">
            <?php elseif(is_pelayan()) : ?>
              <img src="/assets/img/resto/pelayan.png" class="img-circle elevation-2" alt="Foto Pelayan">
            <?php elseif(is_kasir()) : ?>
              <img src="/assets/img/resto/kasir.png" class="img-circle elevation-2" alt="Foto Kasir">
            <?php endif; ?>
          </div>
        </div>
        <div class="col">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><?= session()->get('nama'); ?></a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li>
              <a href="/login/logout" class="dropdown-item">Keluar</a>
            </li>
          </ul>
        </div>
    </li>
      </div>
  </ul>
</nav>
  <!-- /.navbar -->