<?= $this->extend('layout/master-layout') ?>

<?php $this->section('title') ?>
Daftar Anggota
<?php $this->endSection() ?>

<?php $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h2 class="text-center mt-2">Daftar Anggota</h2>
        </div>
    </div>
    <div class="row">
<<<<<<< HEAD
        <div class="col-md-10">
=======
        <div class="col-md-10 mt-3">
>>>>>>> kembali
            <a href="/member/create" class="btn btn-primary">Tambah Anggota Baru</a>
        </div>
    </div>
    <div class="row">
<<<<<<< HEAD
        <div class="col-md-10 mt-2">
            <?php $success = session()->getFlashdata('success') ?>
            <?php if ($success) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Anggota baru berhasil</strong> <?= session()->getFlashdata('success') ?>.
=======
        <div class="col-md-10 my-2">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Data anggota berhasil</strong> <?= session()->getFlashdata('success') ?>
>>>>>>> kembali
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
<<<<<<< HEAD
            <table class="table mt-1">
=======
            <table class="table">
>>>>>>> kembali
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
                                <a href="<?= base_url('member/edit/' . $member['id_anggota']) ?>" class="badge badge-pill badge-warning">Ubah</a>
                                <a onClick="return confirm('Hapus anggota ini...?')" href="<?= base_url('member/delete/' . $member['id_anggota']) ?>" class="badge badge-pill badge-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->endSection() ?>