<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Ubah Kategori</h1>
  <div class="row">
    <div class="col-md-4">
      <form action="<?= base_url('category/' . $category['category_id']) ?>" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <?= csrf_field() ?>
        <div class="form-group">
          <label for="exampleFormControlInput1">Nama Kategori</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="kategori" value="<?= $category['category_name'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
