<main id="main" class="main">
  <div class="pagetitle">
    <h1>Data Arsip</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
        <li class="breadcrumb-item active">Data Arsip</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Daftar Arsip</h5>
            <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                <i class="bi bi-plus"></i> Tambah Arsip
            </a>
            <div class="table-responsive">
            <table class="table datatable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Arsip</th>
                    <th>Nama File</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($arsip as $i => $a): ?>
                <tr>
                    <td><?= $i+1 ?></td>
                    <td><?= $a->kode_arsip ?></td>
                    <td><?= $a->nama_file ?></td>
                    <td><?= $a->keterangan ?></td>
                    <td><?= $a->tanggal_upload ?></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalPreview<?= $a->id ?>">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="<?= site_url('arsip/hapus/'.$a->id) ?>" onclick="return confirm('Hapus arsip ini?')" class="btn btn-sm btn-danger">
                            <i class="bi bi-trash"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $a->id ?>">
                            <i class="bi bi-pencil"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
            </div>
        </div>

        <!-- modal tambah arsip -->
        <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form action="<?= site_url('arsip/simpan') ?>" method="post" enctype="multipart/form-data" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahLabel">Tambah Arsip</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <!-- input Kode Arsip -->
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Kode Arsip</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="kode_arsip" value="<?= $kode_arsip ?>" readonly>
                        </div>
                    </div>

                    <!-- input Nama File -->
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Nama File</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_file" class="form-control" required>
                        </div>
                    </div>

                    <!-- input Keterangan -->
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <textarea name="keterangan" class="form-control" rows="3"></textarea>
                        </div>
                    </div>

                    <!-- input Upload File -->
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Upload File</label>
                        <div class="col-sm-9">
                            <input type="file" name="file_upload" class="form-control" accept=".pdf">
                            <small class="text-muted">Hanya file PDF yang diperbolehkan.</small>
                        </div>
                    </div>
     

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
                </div>
                </form>
            </div>
        </div>

        <!-- Modal Edit Arsip -->
        <?php foreach($arsip as $a): ?>
            <div class="modal fade" id="modalEdit<?= $a->id ?>" tabindex="-1" aria-labelledby="modalEditLabel<?= $a->id ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form action="<?= site_url('arsip/update/'.$a->id) ?>" method="post" enctype="multipart/form-data" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditLabel<?= $a->id ?>">Edit Arsip</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Kode Arsip</label>
                        <div class="col-sm-9">
                            <input type="text" name="kode_arsip" class="form-control" value="<?= $a->kode_arsip ?>" readonly>
                        </div>
                        </div>

                        <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Nama File</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_file" class="form-control" value="<?= $a->nama_file ?>" required>
                        </div>
                        </div>

                        <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <textarea name="keterangan" class="form-control"><?= $a->keterangan ?></textarea>
                        </div>
                        </div>

                        <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Ganti File (opsional)</label>
                        <div class="col-sm-9">
                            <input type="file" name="file_upload" class="form-control" accept=".pdf">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti file.</small>
                        </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan Perubahan</button>
                    </div>
                    </form>
                </div>
            </div>
        <?php endforeach ?>
        

        <!-- Modal Priview Arsip -->
        <?php foreach($arsip as $a): ?>
            <div class="modal fade" id="modalPreview<?= $a->id ?>" tabindex="-1" aria-labelledby="modalPreviewLabel<?= $a->id ?>" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalPreviewLabel<?= $a->id ?>">Preview Arsip <?= $a->kode_arsip ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row mb-3">
                            <label class="col-sm-3 fw-bold">Kode Arsip</label>
                            <div class="col-sm-9"><?= $a->kode_arsip ?></div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 fw-bold">Nama File</label>
                            <div class="col-sm-9"><?= $a->nama_file ?></div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 fw-bold">Keterangan</label>
                            <div class="col-sm-9"><?= $a->keterangan ?></div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-3 fw-bold">Tanggal Upload</label>
                            <div class="col-sm-9">
                            <?= date('d M Y', strtotime($a->tanggal_upload)) ?>
                            </div>
                        </div>

                        <hr class="mb-4">

                        <div class="text-center">
                            <?php
                            $ext = pathinfo($a->file_upload, PATHINFO_EXTENSION);
                            $isImage = in_array(strtolower($ext), ['jpg', 'jpeg', 'png']);
                            $isPDF = strtolower($ext) === 'pdf';
                            $filePath = base_url('uploads/'.$a->file_upload);
                            ?>

                            <?php if ($isImage): ?>
                            <img src="<?= $filePath ?>" alt="Preview" class="img-fluid rounded shadow" style="max-height: 600px;">
                            <?php elseif ($isPDF): ?>
                            <iframe src="<?= base_url('uploads/' . $a->file_upload) ?>" width="100%" height="500px" style="border:none;"></iframe>
                            <?php else: ?>
                            <div class="alert alert-warning">Preview tidak tersedia untuk tipe file ini.<br>
                                <a href="<?= $filePath ?>" class="btn btn-outline-primary mt-2" target="_blank">Lihat File</a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        <?php endforeach; ?>


    </div>
  </section>
</main>
