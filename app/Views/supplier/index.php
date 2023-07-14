<?php $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <button class="btn btn-primary readSupplier">Lihat Data</button>
                <button class="btn btn-primary addSupplier" hidden>Tambah Data</button>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="card-text viewDataSupplier"></div>
            </div>
        </div>
    </div>
</div>
<div class="addModal" style="display:none"></div>

<script>
    function readSuppliers() {
        $.ajax({
            url: "<?= site_url('supplier/readSupplier'); ?>",
            dataType: "json",
            success: function(response) {
                $('.viewDataSupplier').html(response.data);
                $('.addSupplier').removeAttr("hidden");
                $('.readSupplier').html('<i class="fa fa-arrows-rotate"></i>');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function addSupplier() {

        $.ajax({
            url: "<?= site_url('supplier/addSupplier'); ?>",
            dataType: "json",
            success: function(response) {
                $('.addModal').html(response.data).show();
                $('#addModal').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }
</script>

<?= $this->endSection(); ?>