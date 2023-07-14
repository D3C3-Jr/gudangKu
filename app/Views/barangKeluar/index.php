<?php $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <button class="btn btn-primary readBarangKeluar">Lihat Data</button>
                <button class="btn btn-primary addBarangKeluar" hidden>Tambah Data</button>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="card-text viewDataBarangKeluar"></div>
            </div>
        </div>
    </div>
</div>
<div class="addModalBarangKeluar" style="display:none"></div>

<script>
    function readBarangKeluar() {
        $.ajax({
            url: "<?= site_url('barangKeluar/readBarangKeluar'); ?>",
            dataType: "json",
            success: function(response) {
                $('.viewDataBarangKeluar').html(response.data);
                $('.addBarangKeluar').removeAttr("hidden");
                $('.readBarangKeluar').html('<i class="fa fa-arrows-rotate"></i>');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    };

    function addBarangKeluar() {

        $.ajax({
            url: "<?= site_url('barangKeluar/addBarangKeluar'); ?>",
            dataType: "json",
            success: function(response) {
                $('.addModalBarangKeluar').html(response.data).show();
                $('#addModalBarangKeluar').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });

    }
</script>
<?= $this->endSection(); ?>