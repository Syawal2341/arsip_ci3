<?php
  $this->load->view('template/header', [
    'title' => 'Dashboard',
    'username' => $this->session->userdata('username'),
    'role' => $this->session->userdata('role')
  ]);

  $this->load->view('template/sidebar');
?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Dashboard</h1>
  </div>

  <section class="section dashboard">
    <div class="row">
      <div class="col-12">
        <div class="card p-4">
          <h5>Selamat Datang <?= $username ?>!</h5>
          <p>Login sebagai: <?= $role ?></p>
        </div>
      </div>
    </div>
  </section>
</main>

<?php $this->load->view('template/footer'); ?>

