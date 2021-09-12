<?= $this->extend('layout/master-layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-10 mt-3"><a href="/borrow/create" class="btn btn-primary">Tambah Pinjaman Buku</a></div>
    </div>
    <div class="row">
        <div class="col-md-10 mt-2">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Peminjaman buku berhasil</strong> <?= session()->getFlashdata('success') ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Anggota</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pinjam as $no => $res) : ?>
                        <tr>
                            <th scope="row"><?= $no + 1 ?></th>
                            <td><?= $res['nama'] ?></td>
                            <td><?= $res['judul'] ?></td>
                            <td><?= $res['tgl_pinjam'] ?></td>
                            <td><a href="" class="badge badge-pill badge-primary">Kembali</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
