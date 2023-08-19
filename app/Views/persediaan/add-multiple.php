<!-- Modal -->
<div class="modal fade" id="addModalPersediaan" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('persediaan/saveMultiplePersediaan', ['class' => 'saveMultiplePersediaan']) ?>
            <div class="modal-body">

                <div class="form-group row">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <td width="70%">Barang</td>
                                <td>Jumlah</td>
                                <td>#</td>
                            </tr>
                        </thead>
                        <tbody id="tambahanField">
                            <tr>
                                <td>
                                    <select class="form-control form-control-sm id_barang" style="width: 100%;" name="id_barang[]" id="id_barang">
                                        <option selected hidden disabled>Pilih Barang</option>
                                        <?php foreach ($barangs as $barang) : ?>
                                            <option value="<?= $barang['id_barang'] ?>"><?= $barang['kode_barang'] ?> | <?= $barang['nama_barang'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td><input type="text" id="jumlah" name="jumlah[]" class="form-control form-control-sm"></td>
                                <td><button type="button" id="tambahField" class="btn btn-sm btn-info"><i class="fa fa-plus"></i></button></td>
                            </tr>
                        </tbody>

                    </table>
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

        $('#tambahField').click(function() {
            var tambahanField = `
                <tr id="fieldTambahan">
                    <td>
                        <select class="form-control form-control-sm id_barang" style="width: 100%;" name="id_barang" id="id_barang">
                            <option selected hidden disabled>Pilih Barang</option>
                                <?php foreach ($barangs as $barang) : ?>
                                    <option value="<?= $barang['id_barang'] ?>"><?= $barang['kode_barang'] ?> | <?= $barang['nama_barang'] ?></option>
                                <?php endforeach; ?>
                        </select>
                    </td>
                    <td><input type="text" id="jumlah" name="jumlah[]" class="form-control form-control-sm"></td>
                    <td><button type="button" id="hapusField" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
                </tr>
            `;
            $('#tambahanField').append(tambahanField);
            $('.id_barang').select2();
        });
        $("body").on("click", "#hapusField", function() {
            $(this).parents("#fieldTambahan").remove();
        });

        $('.saveMultiplePersediaan').submit(function(e) {
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
                    if (response.success) {
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
                    // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr.status + "\n" + xhr.responseText + "\n" + thrownError,
                    });
                    $('#addModalPersediaan').modal('hide');
                    readPersediaan();
                }
            });
            return false;
        });
    })
</script>