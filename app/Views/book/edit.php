<?php $this->extend('layout/default') ?>

<?php $this->section('title') ?>
Ubah Buku
<?php $this->endSection() ?>

<?php $this->section('content') ?>
<div class="container">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ubah data buku</h1>
  </div>
  <div class="row">
    <div class="col-md-5 my-3">
      <form action="<?= base_url('/book/update/' . $book['book_id']) ?>" method="POST">
        <?= csrf_field() ?>
        <input type="hidden" value="<?= $book['book_id'] ?>">
        <div class="form-group">
          <label for="judul">Judul Buku</label>
          <input type="text" class="form-control <?= ($validation->hasError('judul') ? 'is-invalid' : '') ?>" name="judul" id="judul" value="<?= (old('judul') ? old('judul') : $book['book_title']) ?>">
          <?php if ($validation->getError('judul')) : ?>
            <div id="judul" class="invalid-feedback">
              <?= $validation->getError('judul') ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="form-group">
          <label for="kategori">Kategori</label>
          <select class="form-control" name="kategori" id="kategori">
            <option <?php if ($book['book_category'] == 'Komik') echo 'selected' ?> value="Komik">Komik</option>
            <option <?php if ($book['book_category'] == 'Novel') echo 'Selected' ?> value="Novel">Novel</option>
          </select>
        </div>
        <div class="form-group">
          <label for="penulis">Penulis</label>
          <input type="text" class="form-control <?= ($validation->hasError('penulis') ? 'is-invalid' : '') ?>" name="penulis" id="penulis" value="<?= (old('penulis') ? old('penulis') : $book['book_writer']) ?>">
          <?php if ($validation->getError('penulis')) : ?>
            <div id="penulis" class="invalid-feedback">
              <?= $validation->getError('penulis') ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="form-group">
          <label for="penerbit">Penerbit</label>
          <input type="text" class="form-control" name="penerbit" id="penerbit" value="<?= $book['book_publisher'] ?>">
        </div>
        <div class="form-group">
          <label for="th_terbit">Tahun Terbit</label>
          <input type="text" class="form-control" name="th_terbit" id="th_terbit" value="<?= $book['book_date_publish'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('book') ?>" class="btn btn-warning">Kembali</a>
      </form>
    </div>
  </div>
</div>
<?php $this->endSection() ?>
