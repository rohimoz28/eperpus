<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Peminjaman Buku</h1>
    </div>

    <div class="row">
      <div class="col-md-12">
        <?php if (session()->getflashdata('success')) : ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Peminjaman buku berhasil</strong> <?= session()->getFlashdata('success') ?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>

        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <form action="<?= base_url('borrow/store') ?>" method="POST">
                  <div class="form-group">
                    <label for="anggota">Judul Buku</label>
                    <select name="anggota" class="search-member form-control"></select>
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
        </div>

      </div>
    </div>
  </section>
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> -->
<script>
  $('.search-member').select2({
    // placeholder: '----- Search -----',
    ajax: {
      url: '<?php echo base_url('/borrow/search-member'); ?>',
      dataType: 'json',
      delay: 350,
      cache: true,
      processResults: function(records) {
        return {
          results: records
        };
      }
    }
  });
</script>

<?= $this->endSection() ?>