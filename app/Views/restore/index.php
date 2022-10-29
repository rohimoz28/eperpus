<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Buku Kembali</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <div id="table-1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

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

                      <div class="col-sm-12">

                        <div class="card-header d-flex justify-content-end">
                          <form action="<?= base_url('restore/generatePdf') ?>" method="POST">
                            <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Print to PDF</button>
                          </form>
                        </div>

                        <table class="table table-striped dataTable no-footer" id="table-1" role="grid" aria-describedby="table-1_info">
                          <thead>
                            <tr role="row">
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
                    </div>
                    <!-- <div class="row">
                    <div class="col-sm-12 col-md-5">
                      <div class="dataTables_info" id="table-1_info" role="status" aria-live="polite">Showing 1 to 4 of 4 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                      <div class="dataTables_paginate paging_simple_numbers" id="table-1_paginate">
                        <ul class="pagination">
                          <li class="paginate_button page-item previous disabled" id="table-1_previous"><a href="#" aria-controls="table-1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                          <li class="paginate_button page-item active"><a href="#" aria-controls="table-1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                          <li class="paginate_button page-item next disabled" id="table-1_next"><a href="#" aria-controls="table-1" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
                        </ul>
                      </div>
                    </div>
                  </div> -->
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