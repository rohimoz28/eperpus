<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Tambah Kategori</h1>
  <div class="row">
    <div class="col-md-4">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col" class="text-center">No</th>
            <th scope="col" class="text-center">First</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($categories as $no => $category) : ?>
            <tr>
              <th scope="row" class="text-center"><?= $no + 1 ?></th>
              <td class="text-center"><?= $category['category_name'] ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>

<?= $this->endSection() ?>
