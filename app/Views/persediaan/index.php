<?php $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <button class="btn btn-primary readPersediaan">Lihat Data Persediaan</button>
                <button class="btn btn-primary addPersediaan" hidden>Tambah Data Persediaan</button>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="card-text viewDataPersediaan"></div>
            </div>
        </div>
    </div>
</div>
<div class="addModalPersediaan" style="display:none"></div>

<script>
    function readPersediaan() {
        $.ajax({
            url: "<?= site_url('persediaan/readPersediaan'); ?>",
            dataType: "json",
            success: function(response) {
                $('.viewDataPersediaan').html(response.data);
                $('.addPersediaan').removeAttr("hidden");
                $('.readPersediaan').html('<i class="fa fa-arrows-rotate"></i>');
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