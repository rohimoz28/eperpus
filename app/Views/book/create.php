<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Daftar Buku</h1>
    </div>

    <div class="row">
      <div class="col-md-12">
        <?php if (session()->getflashdata('success')) : ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Buku baru berhasil</strong> <?= session()->getFlashdata('success') ?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>

        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-body">
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
                    <input type="text" class="form-control" name="th_terbit">
                  </div>
                  <div class="row mb-2">
                    <div class="col-sm-3">
                      <img src="<?= base_url('img/upload/default.jpg') ?>" id="preview" class="img-thumbnail">
                    </div>
                    <div class="col-sm-9">
                      <input type="file" class="custom-file-input" name="gambar" id="image">
                      <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                  </div>
                  <div class=" form-group">
                    <div class="d-flex flex-row ml-0">
                      <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                      <a href="<?= base_url('book') ?>" class="btn btn-warning">Kembali</a>
                    </div>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>

<?= $this->endSection() ?>