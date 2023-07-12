<?php $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <button class="btn btn-primary readBarangMasuk">Lihat Data Barang Masuk</button>
                <button class="btn btn-primary addBarangMasuk" hidden>Tambah Data Barang Masuk</button>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="card-text viewDataBarangMasuk"></div>
            </div>
        </div>
    </div>
</div>
<div class="addModalBarangMasuk" style="display:none"></div>

<script>
    function readBarangMasuk() {
        $.ajax({
            url: "<?= site_url('barangMasuk/readBarangMasuk'); ?>",
            dataType: "json",
            success: function(response) {
                $('.viewDataBarangMasuk').html(response.data);
                $('.addBarangMasuk').removeAttr("hidden");
                $('.readBarangMasuk').html('<i class="fa fa-arrows-rotate"></i>');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    };

    function addBarang() {

        $.ajax({
            url: "<?= site_url('barang/addBarang'); ?>",
            dataType: "json",
            success: function(response) {
                $('.addModalBarang').html(response.data).show();
                $('#addModalBarang').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });

    }
</script>
<?= $this->endSection(); ?>