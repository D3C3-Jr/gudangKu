<?php $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <button class="btn btn-block btn-primary addSupplier">Tambah Data Supplier</button>
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
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function addSupplier() {
        $('.addSupplier').click(function(e) {
            e.preventDefault();
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
        })
    }
</script>

<?= $this->endSection(); ?>