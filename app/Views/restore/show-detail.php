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
                        <td><?= $detail['nama'] ?></td>
                    </tr>
                    <tr>
                        <th>Judul Buku</th>
                        <td><?= $detail['judul'] ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Pinjam</th>
                        <td><?= $detail['tgl_pinjam'] ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Kembali</th>
                        <td><?= $detail['tgl_kembali'] ?></td>
                    </tr>
                    <tr>
                        <th>Telat</th>
                        <td><?= $detail['telat'] ?> hari</td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td><?= $detail['keterangan'] ?></td>
                    </tr>
                    <tr>
                        <th>Denda Telat</th>
                        <td>Rp.<?= $detail['denda_telat'] ?></td>
                    </tr>
                    <tr>
                        <th>Denda Buku</th>
                        <td>Rp.<?= $detail['denda_buku'] ?></td>
                    </tr>
                    <tr>
                        <th>Total Denda</th>
                        <td>Rp.<?= $detail['total_denda'] ?></td>
                    </tr>
                    <tr>
                        <th>Status Buku</th>
                        <td><?= $detail['status_buku'] ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="<?= base_url('restore/index') ?>" class="btn btn-warning">Kembali</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>