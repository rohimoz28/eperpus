<?= $this->extend('layout/default') ?>

<?php $this->section('content') ?>

<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between col-md-12 my-3">
		<h1 class="h3 mb-0 text-gray-800">Denda Telat</h1>
	</div>
	<div class="row">
		<div class="col-md-5">
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
							<td class="text-center"><?= $res['rent_day'] ?> hari</td>
							<td class="text-center"><?= $res['late_fine'] ?> /hari</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<a href="<?= base_url('latefine/edit') ?>" class="btn btn-info">Ubah</a>
		</div>
	</div>
</div>

<?php $this->endSection() ?>
