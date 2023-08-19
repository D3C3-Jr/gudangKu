<?php $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3  align-items-center justify-content-between">
                <button class="btn btn-sm btn-primary readPersediaan"><i class="fa fa-arrows-rotate"></i></button>
                <button class="btn btn-sm btn-primary addPersediaan"><i class="fa fa-plus"></i></button>
                <!-- <button class="btn btn-sm btn-success addMultiplePersediaan">Tambah Banyak Data</button> -->
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
    $(document).ready(function() {
        readPersediaan();
        $('.readPersediaan').click(function() {
            readPersediaan();
        });
        $('.addPersediaan').click(function() {
            addPersediaan();
        });
        $('.addMultiplePersediaan').click(function() {
            addMultiplePersediaan();
        })
    });

    function readPersediaan() {
        $.ajax({
            url: "<?= site_url('persediaan/readPersediaan'); ?>",
            dataType: "json",
            success: function(response) {
                $('.viewDataPersediaan').html(response.data);
                $('.addPersediaan').removeAttr("hidden");
                $('.readPersediaan').removeAttr("hidden");
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    };

    function addPersediaan() {
        $.ajax({
            url: "<?= site_url('persediaan/addPersediaan'); ?>",
            dataType: "json",
            success: function(response) {
                $('.addModalPersediaan').html(response.data).show();
                $('#addModalPersediaan').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function addMultiplePersediaan() {
        $.ajax({
            url: "<?= site_url('persediaan/addMultiplePersediaan'); ?>",
            dataType: "json",
            success: function(response) {
                $('.addModalPersediaan').html(response.data).show();
                $('#addModalPersediaan').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }
</script>
<?= $this->endSection(); ?>