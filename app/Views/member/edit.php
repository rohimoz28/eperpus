<?php $this->extend('layout/master-layout') ?>

<?php $this->section('content') ?>
<div class="container">
    <div class="row">
        <?php if (session()->getFlashdata('error')) : ?>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3">
            <h2 class="text-center">Halaman Ubah Anggota Baru</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 my-3">
            <?php $validation = \Config\Services::validation(); ?>
            <form action="<?= base_url('/member/update/' . $member['id_anggota']) ?>" method="POST">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="nama">Nama anggota</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nama') ? 'is-invalid' : '') ?>" name="nama" id="nama" value="<?= (old('nama') ? old('nama') : $member['nama']) ?>">
                    <?php if ($validation->getError('nama')) : ?>
                        <div id="nama" class="invalid-feedback">
                            <?= $validation->getError('nama') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="jkel">Jenis Kelamin</label>
                    <select class="form-control" name="jkel" id="jkel">
                        <option <?php if ($member['jkel'] == 'Pria') echo 'selected' ?> value="Pria">Pria</option>
                        <option <?php if ($member['jkel'] == 'Wanita') echo 'selected' ?> value="Wanita">Wanita</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control <?= ($validation->hasError('alamat') ? 'is-invalid' : '') ?>" name="alamat" id="alamat" rows="3"><?= (old('alamat') ? old('alamat') : $member['alamat']) ?></textarea>
                    <?php if ($validation->getError('alamat')) : ?>
                        <div id="alamat" class="invalid-feedback">
                            <?= $validation->getError('alamat') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
</div>
<?php $this->endSection() ?>