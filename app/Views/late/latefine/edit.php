<?= $this->extend('layout/default') ?>

<?php $this->section('content') ?>

<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between col-md-12 my-3">
		<h1 class="h3 mb-0 text-gray-800">Ubah data denda telat</h1>
	</div>
	<div class="row">
		<div class="col-md-3">
			<form action="<?= base_url('latefine/update/' . $latefine['late_fine_id']) ?>" method="POST">
				<?= csrf_field() ?>
				<input type="hidden" name="_method" value="PUT">
				<div class="form-group">
					<label for="sewa">Lama sewa</label>
					<input type="text" class="form-control <?= ($validation->hasError('sewa') ? 'is-invalid' : '') ?>" id="sewa" name="sewa" value="<?= (old('sewa')) ? old('sewa') : $latefine['rent_day'] ?>">
					<?php if ($validation->hasError('sewa')) : ?>
						<div class="invalid-feedback">
							<?= $validation->getError('sewa'); ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="form-group">
					<label for="denda">Denda Telat</label>
					<input type="text" class="form-control <?= ($validation->hasError('denda') ? 'is-invalid' : '') ?>" id="denda" name="denda" value="<?= (old('denda')) ? old('denda') : $latefine['late_fine'] ?>">
					<?php if ($validation->hasError('denda')) : ?>
						<div class="invalid-feedback">
							<?= $validation->getError('denda'); ?>
						</div>
					<?php endif; ?>
				</div>

				<button type="submit" class="btn btn-primary">Simpan</button>
				<a href="<?= base_url('latefine') ?>" class="btn btn-warning">Kembali</a>
			</form>
		</div>
	</div>
</div>

<?php $this->endSection() ?>
