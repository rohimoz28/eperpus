<?php $this->extend('layout/default') ?>

<!-- Add CSS -->
<?php $this->section('css') ?>
<style>
  .hideImage {
    display: none;
  }

  #preview-image {
    margin-top: 10px;
    width: 200px;
    height: 200px;
  }
</style>
<!-- CSS Boostrap 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
<!-- CSS Bootstrap Datepicker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
<?php $this->endSection() ?>

<?php $this->section('content') ?>
<div class="container">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah data buku</h1>
  </div>
  <div class="row">
    <div class="col-md-5 my-3">
      <?php $validation = \Config\Services::validation(); ?>
      <form action="<?= base_url('/book/store') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="form-group">
          <label for="judul">Judul Buku</label>
          <input type="text" class="form-control <?= ($validation->hasError('judul') ? 'is-invalid' : '') ?>" name="judul" id="judul" value="<?= old('judul') ?>">
          <?php if ($validation->getError('judul')) : ?>
            <div id="judul" class="invalid-feedback">
              <?= $validation->getError('judul') ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="form-group">
          <label for="kategori">Kategori</label>
          <select class="form-control" name="kategori" id="kategori">
            <?php foreach ($categories as $category) : ?>
              <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
              <!--              <option value="Novel">Novel</option> -->
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="penulis">Penulis</label>
          <input type="text" class="form-control <?= ($validation->hasError('penulis') ? 'is-invalid' : '') ?>" name=" penulis" id="penulis" value="<?= old('penulis') ?>">
          <?php if ($validation->getError('penulis')) : ?>
            <div id="penulis" class="invalid-feedback">
              <?= $validation->getError('penulis') ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="form-group">
          <label for="penerbit">Penerbit</label>
          <input type="text" class="form-control" name="penerbit" id="penerbit">
        </div>
        <div class="form-group">
          <label for="th_terbit">Tahun Terbit</label>
          <input type="text" class="form-control datepicker col-md-7" name="th_terbit" id="tanggal_lahir" placeholder="   Select Date">
        </div>
        <!-- <div class="form-group">
          <div class="custom-file mt-2">
            <input type="file" class="custom-file-input" name="gambar" id="preview-image" onchange="previewImg()">
            <label class="custom-file-label" for="customFile">Pilih gambar</label>
          </div>
        </div> -->
        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="gambar" class="form-control col-md-7" id="image" onchange="previewImageFile(this);" accept=".png, .jpg, .jpeg" />
          <img src="" alt="Image preview" id="preview-image" class="hideImage">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('book') ?>" class="btn btn-warning">Kembali</a>
      </form>
    </div>
  </div>
</div>
<?php $this->endSection() ?>

<!-- Add Javascript -->
<?php $this->section('js') ?>
<script>
  function previewImageFile(input, id) {
    var output = document.getElementById('preview-image');
    output.removeAttribute("class");
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src)
    }
  }
</script>
<!-- Javascript Bootstrap Datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js">
</script>

<script type="text/javascript">
  $('.datepicker').datepicker();
</script>
<?php $this->endSection() ?>
