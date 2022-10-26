<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Kategori Buku</h1>
    </div>

    <div class="row">
      <div class="col-md-10">
        <?php if (session()->getflashdata('success')) : ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Kategori Buku berhasil</strong> <?= session()->getFlashdata('success') ?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header d-flex justify-content-start">
                <a href="/category/create" class="btn btn-primary">Tambah Kategori</a>
              </div>
              <div class="card-body">
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
        </div>

      </div>
    </div>
  </section>
</div>

<?= $this->endSection() ?>