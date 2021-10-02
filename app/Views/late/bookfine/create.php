<?= $this->extend('layout/default') ?>

<?php $this->section('content') ?>

<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between col-md-12 my-3">
		<h1 class="h3 mb-0 text-gray-800">Tambah Denda Buku</h1>
	</div>
	<div class="row">
		<div class="col-md-4">
			<?php $validation = \Config\Services::validation(); ?>
			<form action="<?= base_url('bookfine/store') ?>" method="POST">
				<?= csrf_field() ?>
				<div class="form-group">
					<label for="deskripsi">Deskripsi</label>
					<input type="text" name="deskripsi" class="form-control <?= ($validation->getError('deskripsi') ? 'is-invalid' : '') ?>" id="deskripsi">
					<?php if ($validation->getError('deskripsi')) : ?>
						<div class="invalid-feedback">
							<?= $error = $validation->getError('denda'); ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="form-group">
					<label for="denda">Denda</label>
					<input type="text" name="denda" class="form-control <?= ($validation->getError('denda') ? 'is-invalid' : '') ?>" id="denda">
					<?php if ($validation->getError('denda')) : ?>
						<div class="invalid-feedback">
							<?= $error = $validation->getError('denda'); ?>
						</div>
					<?php endif; ?>
				</div>
				<button type="submit" class="btn btn-primary">Simpan</button>
				<a href="<?= base_url('bookfine') ?>" class="btn btn-warning">Kembali</a>
			</form>
		</div>
	</div>
</div>

<?php $this->endSection() ?>
