<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<div class="container">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between col-md-12 my-3">
    <h1 class="h3 mb-0 text-gray-800">Detail anggota</h1>
  </div>
  <div class="row">
    <div class="col-md-5 mt-3">
      <table class="table table-sm">
        <tbody>
          <tr>
            <th>Nama Anggota</th>
            <td><?= $detail['name'] ?></td>
          </tr>
          <tr>
            <th>L / P</th>
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
      <a href="<?= base_url('restore/index') ?>" class="btn btn-warning">Kembali</a>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
