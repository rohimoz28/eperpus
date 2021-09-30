<?= $this->extend('layout/default') ?>

<?php $this->section('content') ?>

<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between col-md-12 my-3">
		<h1 class="h3 mb-0 text-gray-800">Denda Telat</h1>
	</div>
	<div class="row">
		<div class="col-md-5">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th scope="col" class="text-center">Hari Telat</th>
						<th scope="col" class="text-center">Denda Perhari</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($latefine as $res) : ?>
						<tr>
							<td class="text-center"><?= $res['late_day'] ?></td>
							<td class="text-center"><?= $res['late_fine'] ?></td>
						</tr>
				</tbody>
			</table>
		<?php endforeach; ?>
		<a href="<?= base_url('latefine/edit') ?>" class="btn btn-info">Ubah</a>
		</div>
	</div>
</div>

<?php $this->endSection() ?>
