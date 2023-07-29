<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/') ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-warehouse"></i>
        </div>
        <div class="sidebar-brand-text mx-3">TJFI Inventory</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= $title == 'Home' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('/') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- MASTER -->
    <?php if ($title == 'Data Supplier') : ?>
        <li class="nav-item active">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#master" aria-expanded="true" aria-controls="master">
                <i class="fas fa-fw fa-code-merge"></i>
                <span>Master</span>
            </a>
            <div id="master" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu Master:</h6>
                    <a class="collapse-item active" href="<?= base_url('/supplier'); ?>">Data Supplier</a>
                    <a class="collapse-item" href="<?= base_url('/barang'); ?>">Data Barang</a>
                </div>
            </div>
        </li>
    <?php elseif ($title == 'Data Barang') : ?>
        <li class="nav-item active">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#master" aria-expanded="true" aria-controls="master">
                <i class="fas fa-fw fa-code-merge"></i>
                <span>Master</span>
            </a>
            <div id="master" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu Master:</h6>
                    <a class="collapse-item" href="<?= base_url('/supplier'); ?>">Data Supplier</a>
                    <a class="collapse-item active" href="<?= base_url('/barang'); ?>">Data Barang</a>
                </div>
            </div>
        </li>
    <?php else : ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#master" aria-expanded="true" aria-controls="master">
                <i class="fas fa-fw fa-code-merge"></i>
                <span>Master</span>
            </a>
            <div id="master" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu Master:</h6>
                    <a class="collapse-item" href="<?= base_url('/supplier'); ?>">Data Supplier</a>
                    <a class="collapse-item" href="<?= base_url('/barang'); ?>">Data Barang</a>
                </div>
            </div>
        </li>
    <?php endif; ?>
    <!-- END MASTER -->


    <!-- TRANSAKSI -->
    <?php if ($title == 'Data Barang Masuk') : ?>
        <li class="nav-item active">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#transaksi" aria-expanded="true" aria-controls="transaksi">
                <i class="fas fa-fw fa-cart-shopping"></i>
                <span>Transaksi</span>
            </a>
            <div id="transaksi" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu Transaksi:</h6>
                    <a class="collapse-item active" href="<?= base_url('/barangMasuk'); ?>">Barang Masuk</a>
                    <a class="collapse-item" href="<?= base_url('/barangKeluar'); ?>">Barang Keluar</a>
                </div>
            </div>
        </li>
    <?php elseif ($title == 'Data Barang Keluar') : ?>
        <li class="nav-item active">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#transaksi" aria-expanded="true" aria-controls="transaksi">
                <i class="fas fa-fw fa-cart-shopping"></i>
                <span>Transaksi</span>
            </a>
            <div id="transaksi" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu Transaksi:</h6>
                    <a class="collapse-item" href="<?= base_url('/barangMasuk'); ?>">Barang Masuk</a>
                    <a class="collapse-item active" href="<?= base_url('/barangKeluar'); ?>">Barang Keluar</a>
                </div>
            </div>
        </li>
    <?php else : ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#transaksi" aria-expanded="true" aria-controls="transaksi">
                <i class="fas fa-fw fa-cart-shopping"></i>
                <span>Transaksi</span>
            </a>
            <div id="transaksi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu Transaksi:</h6>
                    <a class="collapse-item" href="<?= base_url('/barangMasuk'); ?>">Barang Masuk</a>
                    <a class="collapse-item" href="<?= base_url('/barangKeluar'); ?>">Barang Keluar</a>
                </div>
            </div>
        </li>
    <?php endif; ?>
    <!-- END TRANSASKI -->


    <li class="nav-item <?= $title == 'Data Persediaan' ? 'active' : '' ?>">
        <a class=" nav-link" href="<?= base_url('/persediaan'); ?>">
            <i class="fas fa-fw fa-boxes-stacked"></i>
            <span>Persediaan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->