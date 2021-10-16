<?php $this->extend('layout/default') ?>


<!-- Add CSS -->
<?php $this->section('css') ?>
<?php $this->endSection() ?>

<?php $this->section('content') ?>
<div class="container">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ubah data buku</h1>
  </div>
  <div class="row">
    <div class="col-md-5 my-3">
      <!-- Validation -->
      <?php $validation = \Config\Services::validation(); ?>
      <?php if ($validation->getErrors()) : ?>
        <div class="alert alert-danger" role="alert">
          <?= $validation->listErrors() ?>
        </div>
      <?php endif; ?>

      <!-- Form -->
      <form action="<?= base_url('/book/update/' . $book['book_id']) ?>" method="POST" enctype="multipart/form-data">
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
            <?php foreach ($category as $data) : ?>
              <option <?= ($book['id_category'] == $data['category_id'] ? 'selected' : '') ?> value="<?= $data['category_id'] ?>"><?= $data['category_name'] ?></option>
            <?php endforeach; ?>
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
        <!-- <div class="row mb-2">
          <div class="col-sm-3">
            <img src="<?= base_url('img/upload/' . $book['book_image']); ?>" class="img-thumbnail">
          </div>
          <div class="col-sm-9">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="image" name="gambar">
              <label class="custom-file-label" for="image">Choose file</label>
            </div>
          </div>
        </div> -->

        <div class="row mb-2">
          <div class="col-sm-3">
            <img src="<?= base_url('img/upload/' . $book['book_image']) ?>" class="img-thumbnail">
          </div>
          <div class="col-sm-9">
            <input type="file" class="custom-file-input" name="gambar" id="image" value="<?= $book['book_image'] ?>">
            <label class="custom-file-label" for="image">Choose file</label>
          </div>
          <!-- <input type="file" name="gambar"> -->
        </div>
        <div class=" form-group">
          <div class="d-flex flex-row ml-0">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url('book') ?>" class="btn btn-warning">Kembali</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php $this->endSection() ?>
<!-- Add Javascript -->
<?php $this->section('js') ?>
<!-- Javascript Bootstrap Datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js">
</script>

<script type="text/javascript">
  /* $('.datepicker').datepicker(); */
</script>

<script>
  $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });
</script>

<?php $this->endSection() ?>
