<?= $this->extend('layout/master-layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-10 mt-3">
            <h2 class="text-center">Pengembalian Buku</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 mt-2">
            <?php if (session()->getflashdata('success')) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Buku berhasil</strong> <?= session()->getFlashdata('success') ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Anggota</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Keterangan Buku</th>
                        <th scope="col">Total Denda</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sewa as $no => $res) : ?>
                        <tr>
                            <th scope="row"><?= $no + 1 ?></th>
                            <td><?= $res['nama'] ?></td>
                            <td><?= $res['judul'] ?></td>
                            <td><?= $res['keterangan'] ?></td>
                            <td><?= $res['total_denda'] ?></td>
                            <td>
                                <a href="<?= base_url('restore/showDetail/' . $res['id_sewa']) ?>" class="badge badge-pill badge-success">Detail</a>
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


<?= $this->endSection() ?>
