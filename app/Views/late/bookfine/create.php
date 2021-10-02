<?= $this->extend('layout/default') ?>

<?php $this->section('content') ?>

<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between col-md-12 my-3">
		<h1 class="h3 mb-0 text-gray-800">Tambah Denda Buku</h1>
	</div>
	<div class="row">
		<div class="col-md-4">
			<form action="<?= base_url('bookfine/store') ?>" method="POST">
				<div class="form-group">
					<label for="deskripsi">Deskripsi</label>
					<input type="text" name="deskripsi" class="form-control <?= ($validation->hasError('deskripsi') ? 'is-invalid' : '') ?>" id="deskripsi" value="<?= old('deskripsi') ?>">
					<?php if ($validation->hasError('deskripsi')) : ?>
						<div class="invalid-feedback">
							<?= $validation->getError('deskripsi'); ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="form-group">
					<label for="denda">Denda</label>
					<input type="text" name="denda" class="form-control <?= ($validation->hasError('denda') ? 'is-invalid' : '') ?>" id="denda" value="<?= old('denda') ?>">
					<?php if ($validation->getError('denda')) : ?>
						<div class="invalid-feedback">
							<?= $validation->getError('denda'); ?>
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
