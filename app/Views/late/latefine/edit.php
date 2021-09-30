<?= $this->extend('layout/default') ?>

<?php $this->section('content') ?>

<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between col-md-12 my-3">
		<h1 class="h3 mb-0 text-gray-800">Ubah data denda telat</h1>
	</div>
	<div class="row">
		<div class="col-md-3">
			<form action="<?= base_url('latefine/update/' . $latefine['late_fine_id']) ?>">
				<?= csrf_field() ?>
				<div class="form-group">
					<label for="telat">Hari Telat</label>
					<input type="text" class="form-control" id="telat" name="telat" value="<?= $latefine['late_day'] ?>">
				</div>
				<div class="form-group">
					<label for="denda">Denda Telat</label>
					<input type="text" class="form-control" id="denda" name="denda" value="<?= $latefine['late_fine'] ?>">
				</div>

				<button type="submit" class="btn btn-primary">Simpan</button>
				<a href="<?= base_url('latefine') ?>" class="btn btn-warning">Kembali</a>
			</form>
		</div>
	</div>
</div>

<?php $this->endSection() ?>
