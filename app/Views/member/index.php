<?= $this->extend('layout/default') ?>

<?php $this->section('content') ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between col-md-12 my-3">
    <h1 class="h3 mb-0 text-gray-800">Daftar Anggota</h1>
    <form action="<?= base_url('member/export') ?>" method="POST">
      <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Data Anggota</button>
    </form>
  </div>
  <div class="row">
    <div class="col-md-12 mt-3">
      <a href="<?= base_url('member/create') ?>" class="btn btn-primary">Tambah Anggota Baru</a>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 my-2">
      <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Data anggota berhasil</strong> <?= session()->getFlashdata('success') ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>
      <!-- DataTables Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tabel anggota</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>L / P</th>
                  <th>Alamat</th>
                  <th>Bergabung</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($members as $no => $member) : ?>
                  <tr>
                    <td><?= $no + 1 ?></td>
                    <td><?= $member['name'] ?></td>
                    <td><?= $member['gender'] ?></td>
                    <td><?= $member['address'] ?></td>
                    <td><?= date('Y M d', strtotime($member['created_at']))  ?></td>
                    <td>
                      <a href="<?= base_url('member/edit/' . $member['member_id']) ?>" class="badge badge-pill badge-info">Ubah</a>
                      <a href="<?= base_url('member/delete/' . $member['member_id']) ?>" onclick="return confirm('Yakin ingin hapus?')" class="badge badge-pill badge-danger">Hapus</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->endSection() ?>

<?php $this->section('css') ?>
<!-- Custom styles for this page -->
<link href="<?= base_url('assets/sbadmin') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<?php $this->endSection() ?>

<?php $this->section('js') ?>
<!-- Page level plugins -->
<script src="<?= base_url('assets/sbadmin') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/sbadmin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/sbadmin') ?>/js/demo/datatables-demo.js"></script>
<?php $this->endSection() ?>
