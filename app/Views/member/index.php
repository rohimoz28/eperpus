<?= $this->extend('layout/master-layout') ?>

<?php $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h2 class="text-center mt-2">Daftar Anggota</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 mt-3">
            <a href="<?= base_url('member/create') ?>" class="btn btn-primary">Tambah Anggota Baru</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 my-2">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Data anggota berhasil</strong> <?= session()->getFlashdata('success') ?>
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
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (5 * ($currentPage - 1)) ?>
                    <?php foreach ($members as $member) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $member['name'] ?></td>
                            <td><?= $member['address'] ?></td>
                            <td>
                                <a href="<?= base_url('member/edit/' . $member['member_id']) ?>" class="badge badge-pill badge-warning">Ubah</a>
                                <a onClick="return confirm('Hapus anggota ini...?')" href="<?= base_url('member/delete/' . $member['member_id']) ?>" class="badge badge-pill badge-danger">Hapus</a>
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