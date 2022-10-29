<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Tambah Data Anggota</h1>
    </div>

    <div class="row">
      <div class="col-md-12">
        <?php if (session()->getflashdata('success')) : ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Anggota baru berhasil</strong> <?= session()->getFlashdata('success') ?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>

        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <?php $validation = \Config\Services::validation(); ?>
                <form action="<?= base_url('/member/store') ?>" method="POST">
                  <?= csrf_field() ?>
                  <div class="form-group">
                    <label for="nama">Nama anggota</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nama') ? 'is-invalid' : '') ?>" name="nama" id="nama" value="<?= old('nama') ?>">
                    <?php if ($validation->getError('nama')) : ?>
                      <div id="nama" class="invalid-feedback">
                        <?= $validation->getError('nama') ?>
                      </div>
                    <?php endif; ?>
                  </div>
                  <div class=" form-group">
                    <label for="jkel">Jenis Kelamin</label>
                    <select class="form-control" name="jkel" id="jkel">
                      <option value="Pria">Pria</option>
                      <option value="Wanita">Wanita</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control <?= ($validation->hasError('alamat') ? 'is-invalid' : '') ?>" name="alamat" id="alamat" rows="3"><?= old('alamat') ?></textarea>
                    <?php if ($validation->getError('alamat')) : ?>
                      <div id="alamat" class="invalid-feedback">
                        <?= $validation->getError('alamat') ?>
                      </div>
                    <?php endif; ?>
                  </div>
                  <div class="form-group">
                    <label for="no_telp">Nomer Telepon</label>
                    <input type="text" class="form-control <?= ($validation->hasError('no_telp') ? 'is-invalid' : '') ?>" name="no_telp" id="no_telp" value="<?= old('no_telp') ?>">
                    <?php if ($validation->getError('no_telp')) : ?>
                      <div id="no_telp" class="invalid-feedback">
                        <?= $validation->getError('no_telp') ?>
                      </div>
                    <?php endif; ?>
                  </div>
                  <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" class="form-control <?= ($validation->hasError('email') ? 'is-invalid' : '') ?>" name="email" id="email" value="<?= old('email') ?>">
                    <?php if ($validation->getError('email')) : ?>
                      <div id="email" class="invalid-feedback">
                        <?= $validation->getError('email') ?>
                      </div>
                    <?php endif; ?>
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="<?= base_url('member') ?>" class="btn btn-warning">Kembali</a>
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