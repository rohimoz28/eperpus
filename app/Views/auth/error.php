<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12 mt-5">
            <!-- 404 Error Text -->
            <div class="text-center">
                <div class="error mx-auto" data-text="404">404</div>
                <p class="lead text-gray-800 mb-5">Halaman tidak ditemukan</p>
                <p class="text-gray-500 mb-0">Silahkan kembali ke halaman utama</p>
                <a href="<?= base_url('borrow') ?>">&larr; Back to Dashboard</a>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>
