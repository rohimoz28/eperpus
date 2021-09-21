<?= $this->extend('layout/master-layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-5 mt-3">
            <h2 class="text-center">Tambah Pinjaman Buku</h2>
        </div>
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
                <button type="reset" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>