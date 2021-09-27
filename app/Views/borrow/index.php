<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<div class="container">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Peminjaman buku</h1>
  </div>
  <div class="row">
    <div class="col-md-10 mt-2"><a href="/borrow/create" class="btn btn-primary">Tambah Pinjaman</a></div>
  </div>
  <div class="row">
    <div class="col-md-10 mt-2">
      <?php if (session()->getflashdata('success')) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Peminjaman buku berhasil</strong> <?= session()->getFlashdata('success') ?>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Anggota</th>
            <th scope="col">Judul Buku</th>
            <th scope="col">Tanggal Pinjam</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 + (5 * ($currentPage - 1)) ?>
          <?php foreach ($pinjam as $res) : ?>
            <tr>
              <th scope="row"><?= $i++ ?></th>
              <td><?= $res['name'] ?></td>
              <td><?= $res['book_title'] ?></td>
              <td><?= $res['date_borrow'] ?></td>
              <td><a href="<?= base_url('restore/edit/' . $res['rent_id']) ?>" class="badge badge-pill badge-success">Pengembalian</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <div class="row">
        <div class="col-md-12">
          <div class="d-flex justify-content-end">
            <?= $pager->links('pager', 'default_pager') ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
