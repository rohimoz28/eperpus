<?= $this->extend('layout/default') ?>

<?php $this->section('content') ?>

<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between col-md-12 my-3">
		<h1 class="h3 mb-0 text-gray-800">Tambah Denda Buku</h1>
	</div>
	<div class="row">
		<div class="col-md-4">
			<?php if (session('success')) : ?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Denda buku berhasil</strong> <?= session('success') ?>.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif; ?>
			<form action="<?= base_url('bookfine/store') ?>" method="POST">
				<?= csrf_field() ?>
				<div class="form-group">
					<label for="deskripsi">Deskripsi</label>
					<input type="text" name="deskripsi" class="form-control" id="deskripsi">
				</div>
				<div class="form-group">
					<label for="denda">Denda</label>
					<input type="text" name="denda" class="form-control" id="denda">
				</div>
				<button type="submit" class="btn btn-primary">Simpan</button>
				<a href="<?= base_url('bookfine') ?>" class="btn btn-warning">Kembali</a>
			</form>
		</div>
	</div>
</div>

<?php $this->endSection() ?>
