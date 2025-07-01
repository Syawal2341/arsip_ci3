<h2>Halo, <?= $username ?></h2>
<p>Login sebagai: <?= $role ?></p>

<?php if ($role == 'admin'): ?>
  <p>Anda adalah Admin</p>
<?php elseif ($role == 'petugas'): ?>
  <p>Anda adalah Petugas</p>
<?php endif; ?>

<a href="<?= site_url('auth/logout') ?>">Logout</a>
