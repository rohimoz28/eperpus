<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Master Kategori</h1>
  <div class="row">
    <div class="col-md-4 mb-2">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Tambah Kategori
      </button>
    </div>
  </div>
  <div class="row">
    <div class="col-md-5">
      <?php if (session()->get('success')) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Kategori berhasil</strong> <?= session()->get('success') ?>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col" class="text-center">No</th>
            <th scope="col" class="text-center">Nama Ketegori</th>
            <th scope="col" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($categories as $no => $category) : ?>
            <tr>
              <th scope="row" class="text-center"><?= $no + 1 ?></th>
              <td class="text-center"><?= $category['category_name'] ?></td>
              <td class="text-center">
                <a href="<?= base_url('category/edit/' . $category['category_id']) ?>" class="badge badge-pill badge-success">Ubah</a>
                <a href="<?= base_url('category/delete/' . $category['category_id']) ?>" class="badge badge-pill badge-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('category') ?>" method="POST">
          <?= csrf_field() ?>
          <div class="form-group">
            <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_kategori" placeholder="Nama kategori">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
