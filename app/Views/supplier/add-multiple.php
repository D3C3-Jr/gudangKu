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
            <?= form_open('supplier/saveSupplier', ['class' => 'saveSupplier']) ?>
            <div class="modal-body">

                <table class="table table-sm">
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
                            <td>
                                <input type="text" name="kode_supplier" class="form-control form-control-sm" id="kode_supplier">
                            </td>
                            <td><input type="text" class="form-control form-control-sm"></td>
                            <td><input type="text" class="form-control form-control-sm"></td>
                            <td><input type="text" class="form-control form-control-sm"></td>
                            <td><input type="text" class="form-control form-control-sm"></td>
                            <td><input type="text" class="form-control form-control-sm"></td>
                            <td><input type="text" class="form-control form-control-sm"></td>
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
                <td>
                    <input type="text" name="kode_supplier" class="form-control form-control-sm" id="kode_supplier"
                </td>
                <td><input type="text" class="form-control form-control-sm"></td>
                <td><input type="text" class="form-control form-control-sm"></td>
                <td><input type="text" class="form-control form-control-sm"></td>
                <td><input type="text" class="form-control form-control-sm"></td>
                <td><input type="text" class="form-control form-control-sm"></td>
                <td><input type="text" class="form-control form-control-sm"></td>
                <td><button type="button" id="hapusField" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
            </tr>
            `;
            $('#tambahanField').append(tambahanField);
        });
        $("body").on("click", "#hapusField", function() {
            $(this).parents("#fieldTambahan").remove();
        });

        $('.saveSupplier').submit(function(e) {
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
                        if (response.error.kode_supplier) {
                            $('#kode_supplier').addClass('is-invalid');
                            $('.error_kode_supplier').html(response.error.kode_supplier);
                        } else {
                            $('#kode_supplier').removeClass('is-invalid');
                            $('.error_kode_supplier').html();
                        }

                        if (response.error.nama_supplier) {
                            $('#nama_supplier').addClass('is-invalid');
                            $('.error_nama_supplier').html(response.error.nama_supplier);
                        } else {
                            $('#nama_supplier').removeClass('is-invalid');
                            $('.error_nama_supplier').html();
                        }

                        if (response.error.alamat) {
                            $('#alamat').addClass('is-invalid');
                            $('.error_alamat').html(response.error.alamat);
                        } else {
                            $('#alamat').removeClass('is-invalid');
                            $('.error_alamat').html();
                        }

                        if (response.error.kota) {
                            $('#kota').addClass('is-invalid');
                            $('.error_kota').html(response.error.kota);
                        } else {
                            $('#kota').removeClass('is-invalid');
                            $('.error_kota').html();
                        }

                        if (response.error.telp) {
                            $('#telp').addClass('is-invalid');
                            $('.error_telp').html(response.error.telp);
                        } else {
                            $('#telp').removeClass('is-invalid');
                            $('.error_telp').html();
                        }

                        if (response.error.email) {
                            $('#email').addClass('is-invalid');
                            $('.error_email').html(response.error.email);
                        } else {
                            $('#email').removeClass('is-invalid');
                            $('.error_email').html();
                        }

                    } else {
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
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });
    })
</script>