<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Pengembalian Buku</h1>
    </div>

    <div class="row">
      <div class="col-md-12">
        <?php if (session()->getflashdata('success')) : ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Buku berhasil</strong> <?= session()->getFlashdata('success') ?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header d-flex justify-content-end">
                <form action="<?= base_url('restore/generatePdf') ?>" method="POST">
                  <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Print to PDF</button>
                </form>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama Anggota</th>
                      <th scope="col">Judul Buku</th>
                      <th scope="col">Keterangan Buku</th>
                      <th scope="col">Total Denda</th>
                      <th scope="col">Tanggal Kembali</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($sewa as $no => $res) : ?>
                      <tr>
                        <th scope="row"><?= $no + 1 ?></th>
                        <td><?= $res['name'] ?></td>
                        <td><?= $res['book_title'] ?></td>
                        <td><?= $res['description'] ?></td>
                        <td><?= $res['sum_fine'] ?></td>
                        <td><?= $res['date_return'] ?></td>
                        <td>
                          <a href="<?= base_url('restore/showDetail/' . $res['rent_id']) ?>" class="badge badge-pill badge-success">Detail</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer bg-whitesmoke">
                <div class="d-flex justify-content-center">
                  <?= $pager->links('pager', 'default_pager') ?>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>


<?= $this->endSection() ?>