<main id="main" class="main">
  <div class="pagetitle">
    <h1>Tambah Arsip</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= site_url('arsip') ?>">Data Arsip</a></li>
        <li class="breadcrumb-item active">Tambah</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="card">
      <div class="card-body pt-3">
        <h5 class="card-title">Form Tambah Arsip</h5>

        <form action="<?= site_url('arsip/simpan') ?>" method="post">
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Kode Arsip</label>
            <div class="col-sm-10">
              <input type="text" name="kode_arsip" class="form-control" required>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama File</label>
            <div class="col-sm-10">
              <input type="text" name="nama_file" class="form-control" required>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
              <textarea name="keterangan" class="form-control" rows="4"></textarea>
            </div>
          </div>

          <div class="text-end">
            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
            <a href="<?= site_url('arsip') ?>" class="btn btn-secondary">Kembali</a>
          </div>
        </form>

      </div>
    </div>
  </section>
</main>
