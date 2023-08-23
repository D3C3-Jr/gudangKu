<?php $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header pb-0 align-items-center justify-content-between">
                <button class="btn btn-primary btn-sm mb-2 readBarangKeluar"><i class="fa fa-arrows-rotate"></i></button>
                <button class="btn btn-primary btn-sm mb-2 addBarangKeluar"><i class="fa fa-plus"></i></button>
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
    $(document).ready(function() {
        readBarangKeluar();
        $('.readBarangKeluar').click(function() {
            readBarangKeluar();
        });
        $('.addBarangKeluar').click(function() {
            addBarangKeluar();
        });
    })

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