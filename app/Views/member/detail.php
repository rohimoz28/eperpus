<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Daftar Anggota</h1>
    </div>

    <div class="row">
      <div class="col-md-12">
        <?php if (session()->getflashdata('success')) : ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Anggota baru berhasil</strong> <?= session()->getFlashdata('success') ?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>

        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <table class="table table-sm">
                  <tbody>
                    <tr>
                      <th>Nama Anggota</th>
                      <td><?= $detail['name'] ?></td>
                    </tr>
                    <tr>
                      <th>Jenis Kelamin</th>
                      <td><?= $detail['gender'] ?></td>
                    </tr>
                    <tr>
                      <th>No Telp</th>
                      <td><?= $detail['number'] ?></td>
                    </tr>
                    <tr>
                      <th>Email</th>
                      <td><?= $detail['email'] ?></td>
                    </tr>
                    <tr>
                      <th>Alamat</th>
                      <td><?= $detail['address'] ?></td>
                    </tr>
                    <tr>
                      <th>Bergabung</th>
                      <td><?= date('Y M d', strtotime($detail['created_at']))  ?></td>
                    </tr>
                  </tbody>
                </table>
                <a href="<?= base_url('member') ?>" class="btn btn-warning">Kembali</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>

<?= $this->endSection() ?>