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
								<?php if (session()->getFlashdata()) : ?>
									<div class="alert alert-warning alert-dismissible fade show" role="alert">
										<strong>Denda telat berhasil</strong> <?= session()->getFlashdata('success') ?>.
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
								<?php endif; ?>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th scope="col" class="text-center">Masa Pinjam</th>
											<th scope="col" class="text-center">Denda Perhari</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($latefine as $res) : ?>
											<tr>
												<td class="text-center">Lebih dari <?= $res['rent_day'] ?> hari</td>
												<td class="text-center"><?= $res['late_fine'] ?> /hari</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
								<a href="<?= base_url('latefine/edit') ?>" class="btn btn-info">Ubah</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
</div>

<?= $this->endSection() ?>