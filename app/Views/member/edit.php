<?php $this->extend('layout/master-layout') ?>

<?php $this->section('title') ?>
<title>New Member</title>
<?php $this->endSection() ?>

<?php $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <h2 class="text-center">Halaman Tambah Anggota Baru</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 my-3">
            <form action="<?= base_url('/member/update/' . $member['id_anggota']) ?>" method="POST">
                <?php @csrf_field() ?>
                <div class="form-group">
                    <label for="nama">Nama anggota</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $member['nama'] ?>">
                </div>
                <div class="form-group">
                    <label for="jkel">Jenis Kelamin</label>
                    <select class="form-control" name="jkel" id="jkel">
                        <option <?php if ($member['jkel'] == 'Pria') echo 'selected' ?> value="Pria">Pria</option>
                        <option <?php if ($member['jkel'] == 'Wanita') echo 'selected' ?> value="Wanita">Wanita</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="3"><?= $member['alamat'] ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
</div>
<?php $this->endSection() ?>
