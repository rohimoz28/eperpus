<?= $this->extend('layout/master-layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between col-md-10 my-3">
        <h1 class="h3 mb-0 text-gray-800">Pengembalian Buku</h1>
        <form action="<?= base_url('restore/generatePdf') ?>" method="POST">
            <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download Data Pengembalian Buku</button>
        </form>
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
                            <td><?= $res['name'] ?></td>
                            <td><?= $res['book_title'] ?></td>
                            <td><?= $res['description'] ?></td>
                            <td><?= $res['sum_fine'] ?></td>
                            <td>
                                <a href="<?= base_url('restore/showDetail/' . $res['rent_id']) ?>" class="badge badge-pill badge-success">Detail</a>
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
