<?= $this->extend('layout/master-layout') ?>

<?php $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 mt-3">
            <h2 class="text-center">Daftar Anggota</h2>
        </div>
    </div>
    <div class="row">
        <a href="/member/create" class="btn btn-primary">Tambah Anggota Baru</a>
    </div>
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="rows">
            <div class="col-md-7 my-3">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Anggota baru berhasil</strong> <?= session()->getFlashdata('success') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-10 my-2">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Anggota</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($members as $no => $member) : ?>
                        <tr>
                            <th scope="row"><?= $no + 1 ?></th>
                            <td><?= $member['nama'] ?></td>
                            <td><?= $member['alamat'] ?></td>
                            <td>
                                <a href="" class="badge badge-pill badge-success">Detail</a>
                                <a href="" class="badge badge-pill badge-warning">Ubah</a>
                                <a href="" class="badge badge-pill badge-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->endSection() ?>
