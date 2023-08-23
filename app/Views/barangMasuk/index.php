<?php $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header pb-0 align-items-center justify-content-between">
                <button class="btn btn-primary btn-sm mb-2 readBarangMasuk"><i class="fa fa-arrows-rotate"></i></button>
                <button class="btn btn-primary btn-sm mb-2 addBarangMasuk"><i class="fa fa-plus"></i></button>
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
    $(document).ready(function() {
        readBarangMasuk();
        $('.readBarangMasuk').click(function() {
            readBarangMasuk();
        });
        $('.addBarangMasuk').click(function() {
            addBarangMasuk();
        });
    })

    function readBarangMasuk() {
        $.ajax({
            url: "<?= site_url('barangMasuk/readBarangMasuk'); ?>",
            dataType: "json",
            success: function(response) {
                $('.viewDataBarangMasuk').html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    };

    function addBarangMasuk() {

        $.ajax({
            url: "<?= site_url('barangMasuk/addBarangMasuk'); ?>",
            dataType: "json",
            success: function(response) {
                $('.addModalBarangMasuk').html(response.data).show();
                $('#addModalBarangMasuk').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });

    }
</script>
<?= $this->endSection(); ?>