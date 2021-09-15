<?php $this->extend('layout/master-layout') ?>

<?php $this->section('title') ?>
Ubah Buku
<?php $this->endSection() ?>

<?php $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <h2 class="text-center">Halaman Ubah Data Buku</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 my-3">
            <form action="<?= base_url('/book/update/' . $book['id_buku']) ?>" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" value="<?= $book['id_buku'] ?>">
                <div class="form-group">
                    <label for="judul">Judul Buku</label>
                    <input type="text" class="form-control <?= ($validation->hasError('judul') ? 'is-invalid' : '') ?>" name="judul" id="judul" value="<?= (old('judul') ? old('judul') : $book['judul']) ?>">
                    <?php if ($validation->getError('judul')) : ?>
                        <div id="judul" class="invalid-feedback">
                            <?= $validation->getError('judul') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select class="form-control" name="kategori" id="kategori">
                        <option <?php if ($book['kategori'] == 'Komik') echo 'selected' ?> value="Komik">Komik</option>
                        <option <?php if ($book['kategori'] == 'Novel') echo 'Selected' ?> value="Novel">Novel</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="penulis">Penulis</label>
                    <input type="text" class="form-control <?= ($validation->hasError('penulis') ? 'is-invalid' : '') ?>" name="penulis" id="penulis" value="<?= (old('penulis') ? old('penulis') : $book['penulis']) ?>">
                    <?php if ($validation->getError('penulis')) : ?>
                        <div id="penulis" class="invalid-feedback">
                            <?= $validation->getError('penulis') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" class="form-control" name="penerbit" id="penerbit" value="<?= $book['penerbit'] ?>">
                </div>
                <div class="form-group">
                    <label for="th_terbit">Tahun Terbit</label>
                    <input type="text" class="form-control" name="th_terbit" id="th_terbit" value="<?= $book['th_terbit'] ?>">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
</div>
<?php $this->endSection() ?>