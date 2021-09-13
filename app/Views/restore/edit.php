<?= $this->extend('layout/master-layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-5 mt-3">
            <h2 class="text-center">Pengembalian Buku</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 mt-2">
            <form action="<?= base_url('restore/update') ?>" method="POST">
                <?php @csrf_field() ?>
                <input type="hidden" name="id_sewa" value="<?= $restore['id_sewa'] ?>">
                <input type="hidden" name="tgl_pinjam" value="<?= $restore['tgl_pinjam'] ?>">
                <div class="form-group">
                    <label for="nama">Nama Anggota</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $restore['nama'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="judul">Judul Buku</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?= $restore['judul'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="judul">Judul Buku</label>
                    <select class="form-control" name="keterangan_buku">
                        <option value="Baik">Baik</option>
                        <option value="Rusak">Rusak</option>
                        <option value="Hilang">Hilang</option>
                    </select>
                </div>
                <a href="<?= base_url('borrow/index') ?>" class="btn btn-warning">Menu Pinjam</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>