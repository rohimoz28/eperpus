<?= $this->extend('layout/master-layout') ?>

<?php $this->section('content') ?>

<div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between col-md-10 my-3">
        <h1 class="h3 mb-0 text-gray-800">Daftar Buku</h1>
        <form action="<?= base_url('book/export') ?>" method="POST">
            <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download Data Buku</button>
        </form>
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
                    <?php $i = 1 + (5 * ($currentPage - 1)) ?>
                    <?php foreach ($books as $book) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $book['book_title'] ?></td>
                            <td><?= $book['book_category'] ?></td>
                            <td><?= $book['book_writer'] ?></td>
                            <td>
                                <a href="<?= base_url('book/edit/' . $book['book_id']) ?>" class="badge badge-pill badge-warning">Ubah</a>
                                <a onClick="return confirm('Hapus anggota ini...?')" href="<?= base_url('book/delete/' . $book['book_id']) ?>" class="badge badge-pill badge-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-end">
                        <?= $pager->links('pager', 'default_pager') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection() ?>
