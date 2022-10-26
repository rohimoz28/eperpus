<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Daftar Buku</h1>
    </div>

    <div class="row">
      <div class="col-md-12">
        <?php if (session()->getflashdata('success')) : ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Buku baru berhasil</strong> <?= session()->getFlashdata('success') ?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header d-flex justify-content-start">
                <a href="/book/create" class="btn btn-primary">Tambah Buku</a>
              </div>
              <div class="card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Cover</th>
                      <th>Judul buku</th>
                      <th>Penulis</th>
                      <th>Penerbit</th>
                      <th>Terbit</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($books as $no => $book) : ?>
                      <tr>
                        <td><?= $no + 1 ?></td>
                        <td><img src="/img/upload/<?= $book['book_image'] ?>" style="width: 75px;"></td>
                        <td><?= $book['book_title'] ?></td>
                        <td><?= $book['book_writer'] ?></td>
                        <td><?= $book['book_publisher'] ?></td>
                        <td><?= $book['book_date_publish'] ?></td>
                        <td>
                          <a href="<?= base_url('book/edit/' . $book['book_id']) ?>" class="btn btn-sm btn-warning">Ubah</a>
                          <a href="<?= base_url('book/delete/' . $book['book_id']) ?>" onclick="return confirm('Yakin ingin hapus?')" class="btn btn-sm btn-danger" title="Hapus">Hapus</a>
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