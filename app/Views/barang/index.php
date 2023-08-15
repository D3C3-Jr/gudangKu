<?php $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header pb-0 align-items-center justify-content-between">
                <button class="btn btn-primary btn-sm mb-2 readBarang" hidden>Lihat Data</button>
                <button class="btn btn-primary btn-sm mb-2 addBarang" hidden><i class="fas fa-plus"></i></button>
                <button class="btn btn-success btn-sm mb-2 addMultipleBarang" hidden>Tambah Banyak Data</button>
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
    $(document).ready(function() {
        readBarang();
        $('.addBarang').click(function() {
            addBarang();
        });
        $('.addMultipleBarang').click(function() {
            addMultipleBarang();
        });
        $('.readBarang').click(function() {
            readBarang();
        });
    });


    function readBarang() {
        $.ajax({
            url: "<?= site_url('barang/readBarang'); ?>",
            dataType: "json",
            success: function(response) {
                $('.viewDataBarang').html(response.data);
                $('.addBarang').removeAttr("hidden");
                $('.addMultipleBarang').removeAttr("hidden");
                $('.readBarang').removeAttr("hidden");
                $('.deleteMultipleBarang').removeAttr("hidden");
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

    function addMultipleBarang() {
        $.ajax({
            url: "<?= site_url('barang/addMultipleBarang'); ?>",
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