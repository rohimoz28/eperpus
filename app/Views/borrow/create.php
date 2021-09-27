<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<div class="container">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah pinjam buku</h1>
  </div>
  <div class="row">
    <div class="col-md-5 mt-2">
      <form action="<?= base_url('borrow/store') ?>" method="POST">
        <div class="form-group">
          <label for="anggota">Nama Anggota</label>
          <select class="form-control" name="anggota" id="anggota">
            <?php foreach ($members as $member) : ?>
              <option value="<?= $member['member_id'] ?>"><?= $member['name'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="buku">Judul Buku</label>
          <select class="form-control" name="buku" id="buku">
            <?php foreach ($books as $book) : ?>
              <option value="<?= $book['book_id'] ?>"><?= $book['book_title'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="<?= base_url('borrow') ?>" class="btn btn-warning">Kembali</a>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
