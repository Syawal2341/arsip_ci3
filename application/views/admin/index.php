<div class="container mt-3">
  <h3>Data Admin</h3>
  <a href="<?= site_url('admin/tambah') ?>" class="btn btn-primary mb-3">Tambah Admin</a>

  <?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
  <?php endif; ?>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Username</th>
        <th>Nama</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach($admin as $a): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $a->username ?></td>
        <td><?= $a->nama ?></td>
        <td>
          <a href="<?= site_url('admin/update/'.$a->id) ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="<?= site_url('admin/hapus/'.$a->id) ?>" onclick="return confirm('Hapus?')" class="btn btn-danger btn-sm">Hapus</a>
        </td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
