<?php $this->extend('layout/master-layout') ?>

<?php $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <h2 class="text-center">Halaman Tambah Buku Baru</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 my-3">
            <?php $validation = \Config\Services::validation(); ?>
            <form action="<?= base_url('/book/store') ?>" method="POST">
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
                        <option value="Komik">Komik</option>
                        <option value="Novel">Novel</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="penulis">Penulis</label>
                    <input type="text" class="form-control <?= ($validation->hasError('penulis') ? 'is-invalid' : '') ?>"" name=" penulis" id="penulis" value="<?= old('penulis') ?>">
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
                    <input type="text" class="form-control" name="th_terbit" id="th_terbit">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
</div>
<?php $this->endSection() ?>