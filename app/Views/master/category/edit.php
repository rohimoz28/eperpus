<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Ubah Kategori Buku</h1>
    </div>

    <div class="row">
      <div class="col-md-10">
        <?php if (session()->getflashdata('success')) : ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Kategori berhasil</strong> <?= session()->getFlashdata('success') ?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>

        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                <form action="<?= base_url('category/' . $category['category_id']) ?>" method="POST">
                  <input type="hidden" name="_method" value="PUT">
                  <?= csrf_field() ?>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Nama Kategori</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="kategori" value="<?= $category['category_name'] ?>">
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="<?= base_url('category') ?>" class="btn btn-warning">Kembali</a>
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