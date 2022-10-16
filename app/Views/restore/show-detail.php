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
                        <strong>Detail Buku Kembali</strong> <?= session()->getFlashdata('success') ?>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">

                            <div class="card-body">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Nama Anggota</th>
                                            <td><?= $detail['name'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Judul Buku</th>
                                            <td><?= $detail['book_title'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Pinjam</th>
                                            <td><?= $detail['date_borrow'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Kembali</th>
                                            <td><?= $detail['date_return'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Telat</th>
                                            <td><?= $detail['late'] ?> hari</td>
                                        </tr>
                                        <tr>
                                            <th>Keterangan</th>
                                            <td><?= $detail['description'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Denda Telat</th>
                                            <td>Rp.<?= $detail['late_fine'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Denda Buku</th>
                                            <td>Rp.<?= $detail['book_fine'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Total Denda</th>
                                            <td>Rp.<?= $detail['sum_fine'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Status Buku</th>
                                            <td><?= $detail['book_status'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <a href="<?= base_url() ?>/restore" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>


<?= $this->endSection() ?>