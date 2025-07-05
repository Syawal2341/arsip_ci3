<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Petugas</h1>
  </div>

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Petugas</li>
    </ol>
  </nav>

  <?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= $this->session->flashdata('success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Petugas</h6>
      <a href="<?= base_url('petugas/tambah') ?>" class="btn btn-sm btn-primary">
        + Tambah Petugas
      </a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Username</th>
              <th>Nama Petugas</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($petugas as $data): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data->username ?></td>
                <td><?= $data->nama ?></td>
                <td>
                  <a href="<?= base_url('petugas/edit/' . $data->id) ?>" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="<?= base_url('petugas/hapus/' . $data->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus petugas ini?')">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
