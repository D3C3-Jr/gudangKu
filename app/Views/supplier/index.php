<?php $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header pb-0 align-items-center justify-content-between">
                <button class="btn btn-primary btn-sm mb-2 readSupplier"><i class="fa fa-arrows-rotate"></i></button>
                <button class="btn btn-primary btn-sm mb-2 addSupplier"><i class="fas fa-plus"></i></button>
                <button class="btn btn-success btn-sm mb-2 addMultipleSupplier">Tambah Banyak Data</button>
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
    $(document).ready(function() {
        readSuppliers();
        $('.readSupplier').click(function() {
            readSuppliers();
        });
        $('.addSupplier').click(function() {
            addSupplier();
        });
        $('.addMultipleSupplier').click(function() {
            addMultipleSupplier();
        });
    });

    function readSuppliers() {
        $.ajax({
            url: "<?= site_url('supplier/readSupplier'); ?>",
            dataType: "json",
            success: function(response) {
                $('.viewDataSupplier').html(response.data);
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

    function addMultipleSupplier() {
        $.ajax({
            url: "<?= site_url('supplier/addMultipleSupplier'); ?>",
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