<?= $this->extend('layout/master-layout') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 mt-3">
            <h2 class="text-center">Halaman Detail Pengembalian</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 mt-3">
            <table class="table table-sm">
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
            <a href="<?= base_url('restore/index') ?>" class="btn btn-warning">Kembali</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
