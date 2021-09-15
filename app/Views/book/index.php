<?= $this->extend('layout/master-layout') ?>

<?php $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-10 mt-3">
            <h2 class="text-center">Daftar Buku</h2>
        </div>
    </div>
    <div class="row">
        <a href="/book/create" class="btn btn-primary">Tambah Buku Baru</a>
    </div>
    <div class="row">
        <div class="col-md-10 my-1">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Data buku berhasil</strong> <?= session()->getFlashdata('success') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $no => $book) : ?>
                        <tr>
                            <th scope="row"><?= $no + 1 ?></th>
                            <td><?= $book['judul'] ?></td>
                            <td><?= $book['kategori'] ?></td>
                            <td><?= $book['penulis'] ?></td>
                            <td>
                                <a href="<?= base_url('book/edit/' . $book['id_buku']) ?>" class="badge badge-pill badge-warning">Ubah</a>
                                <a onClick="return confirm('Hapus anggota ini...?')" href="<?= base_url('book/delete/' . $book['id_buku']) ?>" class="badge badge-pill badge-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->endSection() ?>