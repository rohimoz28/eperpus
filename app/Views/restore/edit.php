<?= $this->extend('layout/default') ?>

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
                <input type="hidden" name="id_sewa" value="<?= $restore['rent_id'] ?>">
                <input type="hidden" name="tgl_pinjam" value="<?= $restore['date_borrow'] ?>">
                <div class="form-group">
                    <label for="nama">Nama Anggota</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $restore['name'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="judul">Judul Buku</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?= $restore['book_title'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="judul">Judul Buku</label>
                    <select class="form-control" name="keterangan_buku">
                        <?php foreach ($bookfines as $data) : ?>
                            <option value="<?= $data['book_fine_id'] ?>"><?= $data['description'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('borrow/index') ?>" class="btn btn-warning">Menu Pinjam</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
