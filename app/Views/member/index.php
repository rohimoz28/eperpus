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
          <div class="col-md-12">
            <div class="card">
              <div class="card-header d-flex justify-content-start">
                <a href="/member/create" class="btn btn-primary">Tambah Anggota</a>
              </div>
              <div class="card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>L / P</th>
                      <th>No Telp</th>
                      <th>Email</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($members as $no => $member) : ?>
                      <tr>
                        <td><?= $no + 1 ?></td>
                        <td><?= $member['name'] ?></td>
                        <td><?= $member['gender'] ?></td>
                        <td><?= $member['number'] ?></td>
                        <td><?= $member['email'] ?></td>
                        <!-- <td><?= date('Y M d', strtotime($member['created_at']))  ?></td> -->
                        <td>
                          <a href="<?= base_url('member/detail/' . $member['member_id']) ?>" class="badge badge-pill badge-success">Detail</a>
                          <a href="<?= base_url('member/edit/' . $member['member_id']) ?>" class="badge badge-pill badge-info">Ubah</a>
                          <a href="<?= base_url('member/delete/' . $member['member_id']) ?>" onclick="return confirm('Yakin ingin hapus?')" class="badge badge-pill badge-danger">Hapus</a>
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