  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">DataArsip</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= ucfirst($username) ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= ucfirst($username) ?></h6>
                <span><?= ucfirst($role) ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
                <a class="dropdown-item d-flex align-items-center" href="<?= site_url('auth/logout') ?>">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

<?php
  $role = $this->session->userdata('role');
  $current = uri_string(); // URL sekarang
?>

<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link <?= ($current == 'dashboard') ? '' : 'collapsed' ?>" href="<?= site_url('dashboard') ?>">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?= (strpos($current, 'arsip') !== false) ? '' : 'collapsed' ?>" href="<?= site_url('arsip') ?>">
        <i class="bi bi-envelope"></i>
        <span>Data Arsip</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?= (strpos($current, 'boxarsip') !== false) ? '' : 'collapsed' ?>" href="<?= site_url('box_arsip') ?>">
        <i class="bi bi-folder"></i>
        <span>Box Arsip</span>
      </a>
    </li>

    <?php if ($role == 'admin'): ?>
      <li class="nav-item">
        <a class="nav-link <?= (strpos($current, 'admin') !== false) ? '' : 'collapsed' ?>" href="<?= site_url('admin') ?>">
          <i class="bi bi-person-circle"></i>
          <span>Admin</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?= (strpos($current, 'petugas') !== false) ? '' : 'collapsed' ?>" href="<?= site_url('petugas') ?>">
          <i class="bi bi-person"></i>
          <span>Petugas</span>
        </a>
      </li>
    <?php endif; ?>

  </ul>
</aside>
