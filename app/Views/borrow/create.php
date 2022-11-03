<?= $this->extend('layout/dashboard') ?>

<!-- custom css library -->
<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('/assets/css/jquery-ui.css') ?>">

<?= $this->endSection() ?>

<!-- main content -->
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
                  <?= csrf_field() ?>
                  <div class="form-group">
                    <label for="anggota">Nama Anggota</label>
                    <input type="hidden" name="id_anggota" id="id_anggota">
                    <input class="form-control" name="anggota" id="anggota"></input>
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
<?= $this->endSection() ?>

<!-- custom javascript library -->
<?= $this->section('js') ?>
<script src="<?= base_url('/assets/js/jquery-ui.js') ?>"></script>

<script>
  $(function() {
    $("#anggota").autocomplete({
        source: "<?= base_url('/borrow/search-member') ?>",
        minLength: 1,
        focus: function(event, ui) {
          $("#anggota").val(ui.item.text);
          return false;
        },
        select: function(event, ui) {
          $("#anggota").val(ui.item.text);
          $("#id_anggota").val(ui.item.id);
          return false;
        }
      })
      .autocomplete("instance")._renderItem = function(ul, item) {
        return $("<li>")
          .append("<div>" + item.text + "</div>")
          .appendTo(ul);
      };
  });
</script>
<?= $this->endSection() ?>