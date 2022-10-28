<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">E-Library</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="<?= base_url('home/index') ?>"><i class="fas fa-thumbs-up"></i> <span>Ikhtisar</span></a></li>

            <li class="menu-header">Menu</li>
            <li><a class="nav-link" href="<?= base_url('borrow') ?>"><i class="fas fa-cart-plus"></i> <span>Pinjam</span></a></li>
            <li><a class="nav-link" href="<?= base_url('restore') ?>"><i class="fas fa-thumbs-up"></i> <span>Kembali</span></a></li>
            <li><a class="nav-link" href="<?= base_url('member') ?>"><i class=" fas fa-user"></i> <span>Anggota</span></a></li>
            <li><a class="nav-link" href="<?= base_url('book') ?>"><i class="fas fa-book"></i> <span>Buku</span></a></li>

            <?php if (session()->get('role') == 1) : ?>
                <li class="menu-header">Master</li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Master Data</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="<?= base_url('bookfine') ?>">Denda Buku</a></li>
                        <li><a class="nav-link" href="<?= base_url('category') ?>">Kategori Buku</a></li>
                        <li><a class="nav-link" href="<?= base_url('latefine') ?>">Denda Telat</a></li>
                    </ul>
                </li>
            <?php endif ?>
        </ul>

    </aside>
</div>