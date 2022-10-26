<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Denda Telat</h1>
		</div>

		<div class="row">
			<div class="col-md-10">
				<?php if (session()->getflashdata('success')) : ?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Denda Telat berhasil</strong> <?= session()->getFlashdata('success') ?>.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif; ?>

				<div class="row">
					<div class="col-md-8">
						<div class="card">
							<div class="card-body">
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
				</div>

			</div>
		</div>
	</section>
</div>

<?= $this->endSection() ?>