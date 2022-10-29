<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pengembalian Buku</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?php if (session()->getflashdata('success')) : ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Pengembalian Buku</strong> <?= session()->getFlashdata('success') ?>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">

                            <div class="card-body">
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
                </div>

            </div>
        </div>
    </section>
</div>


<?= $this->endSection() ?>