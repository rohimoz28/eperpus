<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Pinjam Buku</h1>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="/borrow/create" class="btn btn-primary">Tambah Data</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th scope="col">Nama Anggota</th>
                      <th scope="col">Judul Buku</th>
                      <th scope="col">Tanggal Pinjam</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($pinjam as $res) : ?>
                      <tr>
                        <th scope="row"><?= $i++ ?></th>
                        <td><?= $res['name'] ?></td>
                        <td><?= $res['book_title'] ?></td>
                        <td><?= $res['date_borrow'] ?></td>
                        <td><a href="<?= base_url('restore/edit/' . $res['rent_id']) ?>" class="badge badge-pill badge-success">Kembali</a></td>
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