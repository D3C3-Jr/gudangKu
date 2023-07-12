<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>

    <li class="nav-item <?= $title == 'Data Supplier' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('/supplier'); ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Suppliers</span>
        </a>
    </li>

    <li class="nav-item <?= $title == 'Data Barang' ? 'active' : '' ?>"">
        <a class=" nav-link" href="<?= base_url('/barang'); ?>">
        <i class="fas fa-fw fa-list"></i>
        <span>Barang</span>
        </a>
    </li>

    <li class="nav-item <?= $title == 'Data Barang Masuk' ? 'active' : '' ?>"">
        <a class=" nav-link" href="<?= base_url('/barangMasuk'); ?>">
        <i class="fas fa-fw fa-download"></i>
        <span>Barang Masuk</span>
        </a>
    </li>

    <li class="nav-item <?= $title == 'Data Barang Keluar' ? 'active' : '' ?>"">
        <a class=" nav-link" href="<?= base_url('/barang'); ?>">
        <i class="fas fa-fw fa-upload"></i>
        <span>Barang Keluar</span>
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