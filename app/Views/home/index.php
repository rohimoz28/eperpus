<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Ikhtisar</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class=" fas fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Anggota</h4>
            </div>
            <div class="card-body">
              <?= $member ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="fas fa-book"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Buku</h4>
            </div>
            <div class="card-body">
              <?= $book ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="fas fa-cart-plus"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Di Pinjam</h4>
            </div>
            <div class="card-body">
              <?= $borrowed ?>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-success">
                                    <i class="fas fa-circle"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Online Users</h4>
                                    </div>
                                    <div class="card-body">
                                        47
                                    </div>
                                </div>
                            </div>
                        </div> -->
    </div>
  </section>
</div>

<?= $this->endSection() ?>
