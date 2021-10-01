<?= $this->extend('layout/default') ?>

<?php $this->section('content') ?>

<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between col-md-12 my-3">
		<h1 class="h3 mb-0 text-gray-800">Denda Buku</h1>
	</div>
	<div class="row">
		<div class="col-md-7 mb-2">
			<a href="<?= base_url('bookfine/create') ?>" class="btn btn-primary">Tambah Denda Buku</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-7">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">#</th>
						<th scope="col" class="text-center">Deskripsi</th>
						<th scope="col" class="text-center">Denda</th>
						<th scope="col" class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($bookfines as $res) : ?>
						<tr>
							<th scope="row">1</th>
							<td class="text-center"><?= $res['description'] ?></td>
							<td class="text-center"><?= $res['book_fine'] ?></td>
							<td class="text-center">
								<a href="<?= base_url('bookfine/edit/' . $res['book_fine_id']) ?>" class="badge badge-pill badge-success">Ubah</a>
								<a href="<?= base_url('bookfine/delete/' . $res['book_fine_id']) ?>" class="badge badge-pill badge-danger">Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php $this->endSection() ?>
