<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('supplier/saveMultipleSupplier', ['class' => 'saveMultipleSupplier']) ?>
            <div class="modal-body">

                <table class="table table-sm table-responsive">
                    <thead>
                        <tr>
                            <td>Kode Supplier</td>
                            <td>Nama Supplier</td>
                            <td>Alamat</td>
                            <td>Kota</td>
                            <td>No Telp</td>
                            <td>Email</td>
                            <td>Jenis </td>
                            <td># </td>
                        </tr>
                    </thead>
                    <tbody id="tambahanField">
                        <tr>
                            <td><input type="text" name="kode_supplier[]" class="form-control form-control-sm" id="kode_supplier" required></td>
                            <td><input type="text" name="nama_supplier[]" class="form-control form-control-sm"></td>
                            <td><input type="text" name="alamat[]" class="form-control form-control-sm"></td>
                            <td><input type="text" name="kota[]" class="form-control form-control-sm"></td>
                            <td><input type="text" name="telp[]" class="form-control form-control-sm"></td>
                            <td><input type="text" name="email[]" class="form-control form-control-sm"></td>
                            <td>
                                <select class="form-control form-control-sm" name="id_jenis_supplier[]" id="id_jenis_supplier">
                                    <option selected hidden>Pilih Jenis Supplier</option>
                                    <?php foreach ($jenis_suppliers as $jenis_supplier) : ?>
                                        <option value="<?= $jenis_supplier['id_jenis_supplier'] ?>"><?= $jenis_supplier['jenis_supplier'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td><button type="button" id="tambahField" class="btn btn-sm btn-info"><i class="fa fa-plus"></i></button></td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btnSave">Save changes</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#tambahField').click(function() {
            var tambahanField = `
            <tr id="fieldTambahan">
                <td><input type="text" name="kode_supplier[]" class="form-control form-control-sm" id="kode_supplier" required></td>
                <td><input type="text" name="nama_supplier[]" class="form-control form-control-sm"></td>
                <td><input type="text" name="alamat[]" class="form-control form-control-sm"></td>
                <td><input type="text" name="kota[]" class="form-control form-control-sm"></td>
                <td><input type="text" name="telp[]" class="form-control form-control-sm"></td>
                <td><input type="text" name="email[]" class="form-control form-control-sm"></td>
                <td>
                    <select class="form-control form-control-sm" name="id_jenis_supplier[]" id="id_jenis_supplier">
                        <option selected hidden>Pilih Jenis Supplier</option>
                        <?php foreach ($jenis_suppliers as $jenis_supplier) : ?>
                            <option value="<?= $jenis_supplier['id_jenis_supplier'] ?>"><?= $jenis_supplier['jenis_supplier'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td><button type="button" id="hapusField" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
            </tr>
            `;
            $('#tambahanField').append(tambahanField);
        });
        $("body").on("click", "#hapusField", function() {
            $(this).parents("#fieldTambahan").remove();
        });

        $('.saveMultipleSupplier').submit(function(e) {
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

                        $('#addModal').modal('hide');
                        readSuppliers();
                    }

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: xhr.status + "\n" + xhr.responseText + "\n" + thrownError,
                    });

                    $('#addModal').modal('hide');
                    readSuppliers();
                }
            });
            return false;
        });
    })
</script>