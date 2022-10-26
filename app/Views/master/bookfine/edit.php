<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Denda Buku</h1>
		</div>

		<div class="row">
			<div class="col-md-10">
				<?php if (session()->getflashdata('success')) : ?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Denda Buku berhasil</strong> <?= session()->getFlashdata('success') ?>.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif; ?>

				<div class="row">
					<div class="col-md-8">
						<div class="card">
							<div class="card-body">
								<form action="<?= base_url('bookfine/update/' . $bookfine['book_fine_id']) ?>" method="POST">
									<?= csrf_field() ?>
									<input type="hidden" name="_method" value="PUT">
									<div class="form-group">
										<label for="deskripsi">Deskripsi</label>
										<input type="text" name="deskripsi" class="form-control <?= ($validation->hasError('deskripsi') ? 'is-invalid' : '') ?>" id="deskripsi" value="<?= (old('deskripsi')) ? old('deskripsi') : $bookfine['description'] ?>">
										<?php if ($validation->hasError('deskripsi')) : ?>
											<div class="invalid-feedback">
												<?= $validation->getError('deskripsi'); ?>
											</div>
										<?php endif; ?>
									</div>
									<div class="form-group">
										<label for="denda">Denda</label>
										<input type="text" name="denda" class="form-control <?= ($validation->hasError('denda') ? 'is-invalid' : '') ?>" id="denda" value="<?= (old('denda')) ? old('denda') : $bookfine['book_fine'] ?>">
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
				</div>

			</div>
		</div>
	</section>
</div>

<?= $this->endSection() ?>