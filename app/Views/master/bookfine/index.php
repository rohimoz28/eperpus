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
					<div class="col-md-12">
						<div class="card">
							<div class="card-header d-flex justify-content-start">
								<a href="/bookfine/create" class="btn btn-primary">Tambah Denda Buku</a>
							</div>
							<div class="card-body">
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
										<?php foreach ($bookfines as $no => $res) : ?>
											<tr>
												<th scope="row"><?= $no + 1 ?></th>
												<td class="text-center"><?= $res['description'] ?></td>
												<td class="text-center"><?= $res['book_fine'] ?></td>
												<td class="text-center">
													<a href="<?= base_url('bookfine/edit/' . $res['book_fine_id']) ?>" class="badge badge-pill badge-success">Ubah</a>
													<a href="<?= base_url('bookfine/delete/' . $res['book_fine_id']) ?>" class="badge badge-pill badge-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
</div>

<?= $this->endSection() ?>