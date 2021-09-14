<?php $this->extend('layout/master-layout') ?>

<?php $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 my-2">
            <h2 class="text-center">Halaman Tambah Anggota Baru</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 mt-2">
            <form action="<?= base_url('/member/store') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="nama">Nama anggota</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= old('nama') ?>">
                    <?php if ($validation->hasError('nama')) : ?>
                        <div id="validationServer03Feedback" class="invalid-feedback">
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
                    <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : '' ?>" name="alamat" id="alamat" rows="3"><?= old('alamat') ?></textarea>
                    <?php if ($validation->hasError('alamat')) : ?>
                        <div id="validationServer03Feedback" class="invalid-feedback">
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