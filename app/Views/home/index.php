<?php $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<!-- <img class="img-fluid" src="<?= base_url() ?>/assets/img/hello.svg" alt=""> -->
<div class="row">
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Data Barang
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $barangs ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-boxes fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Data Supplier
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $suppliers ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Stok Terbanyak</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                    </thead>
                    <tbody>
                        <?php foreach ($persediaanTerbanyak as $persediaan) : ?>
                            <tr>
                                <td><?= $persediaan['nama_barang'] ?></td>
                                <td><?= $persediaan['jumlah'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Stok Terkecil</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                    </thead>
                    <tbody>
                        <?php foreach ($persediaanTerkecil as $persediaan) : ?>
                            <tr>
                                <td><?= $persediaan['nama_barang'] ?></td>
                                <td><?= $persediaan['jumlah'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>