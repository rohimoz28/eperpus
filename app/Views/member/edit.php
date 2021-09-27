<?php $this->extend('layout/default') ?>

<?php $this->section('content') ?>
<div class="container">
  <div class="row">
    <?php if (session()->getFlashdata('error')) : ?>
    <?php endif; ?>
  </div>
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between col-md-12 my-3">
    <h1 class="h3 mb-0 text-gray-800">Ubah data anggota</h1>
  </div>
  <div class="row">
    <div class="col-md-5 my-3">
      <?php $validation = \Config\Services::validation(); ?>
      <form action="<?= base_url('/member/update/' . $member['member_id']) ?>" method="POST">
        <?= csrf_field() ?>
        <div class="form-group">
          <label for="nama">Nama anggota</label>
          <input type="text" class="form-control <?= ($validation->hasError('nama') ? 'is-invalid' : '') ?>" name="nama" id="nama" value="<?= (old('nama') ? old('nama') : $member['name']) ?>">
          <?php if ($validation->getError('nama')) : ?>
            <div id="nama" class="invalid-feedback">
              <?= $validation->getError('nama') ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="form-group">
          <label for="jkel">Jenis Kelamin</label>
          <select class="form-control" name="jkel" id="jkel">
            <option <?php if ($member['gender'] == 'Pria') echo 'selected' ?> value="Pria">Pria</option>
            <option <?php if ($member['gender'] == 'Wanita') echo 'selected' ?> value="Wanita">Wanita</option>
          </select>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea class="form-control <?= ($validation->hasError('alamat') ? 'is-invalid' : '') ?>" name="alamat" id="alamat" rows="3"><?= (old('alamat') ? old('alamat') : $member['address']) ?></textarea>
          <?php if ($validation->getError('alamat')) : ?>
            <div id="alamat" class="invalid-feedback">
              <?= $validation->getError('alamat') ?>
            </div>
          <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('member') ?>" class="btn btn-warning">Kembali</a>
      </form>
    </div>
  </div>
</div>
<?php $this->endSection() ?>
