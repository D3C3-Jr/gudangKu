<!-- Modal -->
<div class="modal fade" id="addModalBarang" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('barang/saveMultipleBarang', ['class' => 'saveMultipleBarang']) ?>
            <div class="modal-body">

                <table class="table table-sm">
                    <thead>
                        <tr>
                            <td>Kode Barang</td>
                            <td>Supplier</td>
                            <td>Nama Barang</td>
                            <td>Jenis Barang</td>
                            <td>#</td>
                        </tr>
                    </thead>
                    <tbody id="tambahanField">
                        <tr>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary btnSave">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#id_supplier').select2();

        $('#tambahField').click(function() {
            var tambahanField = `
            <tr id="fieldTambahan">
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



        $('.saveMultipleBarang').submit(function(e) {
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
                        if (response.error.kode_barang) {
                            $('#kode_barang').addClass('is-invalid');
                            $('.error_kode_barang').html(response.error.kode_barang);
                        } else {
                            $('#kode_barang').removeClass('is-invalid');
                            $('.error_kode_barang').html();
                        }

                        if (response.error.nama_barang) {
                            $('#nama_barang').addClass('is-invalid');
                            $('.error_nama_barang').html(response.error.nama_barang);
                        } else {
                            $('#nama_barang').removeClass('is-invalid');
                            $('.error_nama_barang').html();
                        }

                        if (response.error.id_supplier) {
                            $('#id_supplier').addClass('is-invalid');
                            $('.error_id_supplier').html(response.error.id_supplier);
                        } else {
                            $('#id_supplier').removeClass('is-invalid');
                            $('.error_id_supplier').html();
                        }

                        if (response.error.jenis_barang) {
                            $('#jenis_barang').addClass('is-invalid');
                            $('.error_jenis_barang').html(response.error.jenis_barang);
                        } else {
                            $('#jenis_barang').removeClass('is-invalid');
                            $('.error_jenis_barang').html();
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.success,
                        });

                        $('#addModalBarang').modal('hide');
                        readBarang();
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