<div class="container mt-3">
  <h3>Data Box Arsip</h3>
  <form action="<?= site_url('box/simpan') ?>" method="post" class="mb-3">
    <div class="form-group">
      <input type="text" name="kode_box_arsip" placeholder="Kode Box" required class="form-control">
      <input type="text" name="nama_box_arsip" placeholder="Nama Box" required class="form-control mt-2">
      <button class="btn btn-primary mt-2">Simpan</button>
    </div>
  </form>

  <?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
  <?php endif; ?>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Kode Box</th>
        <th>Nama Box</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach($box as $b): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $b->kode_box_arsip ?></td>
        <td><?= $b->nama_box_arsip ?></td>
        <td><a href="<?= site_url('box/hapus/'.$b->kode_box_arsip) ?>" onclick="return confirm('Hapus box ini?')" class="btn btn-danger btn-sm">Hapus</a></td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
