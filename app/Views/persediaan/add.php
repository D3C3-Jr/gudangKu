<!-- Modal -->
<div class="modal fade" id="addModalPersediaan" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('persediaan/savePersediaan', ['class' => 'savePersediaan']) ?>
            <div class="modal-body">

                <div class="form-group row">
                    <label for="id_barang" class="col-sm-2 col-form-label col-form-label-sm"><b>Barang*</b></label>
                    <div class="col-sm-10">
                        <select class="form-control form-control-sm" style="width: 100%;" name="id_barang" id="id_barang">
                            <option selected hidden disabled>Pilih Barang</option>
                            <?php foreach ($barangs as $barang) : ?>
                                <option value="<?= $barang['id_barang'] ?>"><?= $barang['kode_barang'] ?> | <?= $barang['nama_barang'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jumlah" class="col-sm-2 col-form-label col-form-label-sm"><b>Jumlah*</b></label>
                    <div class="col-sm-10">
                        <input type="number" name="jumlah" class="form-control form-control-sm" id="jumlah" placeholder="Jumlah">
                        <!-- ERROR FEEDBACK -->
                        <div id="error_jumlah" class="invalid-feedback error_jumlah">
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary btnSave">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#id_barang').select2();
        $('.savePersediaan').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btnSave').attr('disable', 'disabled');
                    $('.btnSave').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function(response) {
                    $('.btnSave').removeAttr('disabled');
                    $('.btnSave').html('Save changes');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.jumlah) {
                            $('#jumlah').addClass('is-invalid');
                            $('.error_jumlah').html(response.error.jumlah);
                        } else {
                            $('#jumlah').removeClass('is-invalid');
                            $('.error_jumlah').html();
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.success,
                        });

                        $('#addModalPersediaan').modal('hide');
                        readPersediaan();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });
    })
</script>