<?php $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <button class="btn btn-primary readBarang">Lihat Data Barang</button>
                <button class="btn btn-primary addBarang" hidden>Tambah Data Barang</button>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="card-text viewDataBarang"></div>
            </div>
        </div>
    </div>
</div>
<div class="addModalBarang" style="display:none"></div>

<script>
    function readBarang() {
        $.ajax({
            url: "<?= site_url('barang/readBarang'); ?>",
            dataType: "json",
            success: function(response) {
                $('.viewDataBarang').html(response.data);
                $('.addBarang').removeAttr("hidden");
                $('.readBarang').html('<i class="fa fa-arrows-rotate"></i>');
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