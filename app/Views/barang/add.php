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
            <?= form_open('barang/saveBarang', ['class' => 'saveBarang']) ?>
            <div class="modal-body">

                <div class="form-group row">
                    <div class="col-sm-3 mb-1">
                        <input type="text" name="kode_barang" class="form-control form-control-sm" id="kode_barang" placeholder="Kode Barang">
                        <!-- ERROR FEEDBACK -->
                        <div id="error_kode_barang" class="invalid-feedback error_kode_barang">
                        </div>
                    </div>
                    <div class="col-sm-4 mb-1">
                        <input type="text" name="nama_barang" class="form-control form-control-sm" id="nama_barang" placeholder="Nama barang">
                        <!-- ERROR FEEDBACK -->
                        <div id="error_nama_barang" class="invalid-feedback error_nama_barang">
                        </div>
                    </div>
                    <div class="col-sm-2 mb-1">
                        <select class="form-control form-control-sm" name="jenis_barang" id="jenis_barang">
                            <option selected hidden disabled>Jenis Barang</option>
                            <option value="Mentah">Mentah</option>
                            <option value="Setengah Jadi">Setengah Jadi</option>
                            <option value="Jadi">Jadi</option>
                        </select>
                        <!-- ERROR FEEDBACK -->
                        <div id="error_jenis_barang" class="invalid-feedback error_jenis_barang">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <select class="form-control form-control-sm" style="width: 100%;" name="id_supplier" id="id_supplier">
                            <option selected hidden disabled>Pilih Supplier</option>
                            <?php foreach ($suppliers as $supplier) : ?>
                                <option value="<?= $supplier['id_supplier'] ?>"><?= $supplier['kode_supplier'] ?> | <?= $supplier['nama_supplier'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <!-- ERROR FEEDBACK -->
                        <div id="error_id_supplier" class="invalid-feedback error_id_supplier">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <button type="button" class="btn btn-info btn-sm btn-block" id="tambahField"><i class="fa fa-plus"></i></button>
                    </div>
                </div>

                <div id="newField"></div>

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
            var newField = `
            <div class="form-group row" id="tambahanField">
            <div class="col-sm-3 mb-1">
                        <input type="text" name="kode_barang" class="form-control form-control-sm" id="kode_barang" placeholder="Kode Barang">
                        <!-- ERROR FEEDBACK -->
                        <div id="error_kode_barang" class="invalid-feedback error_kode_barang">
                        </div>
                    </div>
                    <div class="col-sm-4 mb-1">
                        <input type="text" name="nama_barang" class="form-control form-control-sm" id="nama_barang" placeholder="Nama barang">
                        <!-- ERROR FEEDBACK -->
                        <div id="error_nama_barang" class="invalid-feedback error_nama_barang">
                        </div>
                    </div>
                    <div class="col-sm-2 mb-1">
                        <select class="form-control form-control-sm" name="jenis_barang" id="jenis_barang">
                            <option selected hidden disabled>Jenis Barang</option>
                            <option value="Mentah">Mentah</option>
                            <option value="Setengah Jadi">Setengah Jadi</option>
                            <option value="Jadi">Jadi</option>
                        </select>
                        <!-- ERROR FEEDBACK -->
                        <div id="error_jenis_barang" class="invalid-feedback error_jenis_barang">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <select class="form-control form-control-sm" style="width: 100%;" name="id_supplier" id="id_supplier">
                            <option selected hidden disabled>Pilih Supplier</option>
                            <?php foreach ($suppliers as $supplier) : ?>
                                <option value="<?= $supplier['id_supplier'] ?>"><?= $supplier['kode_supplier'] ?> | <?= $supplier['nama_supplier'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <!-- ERROR FEEDBACK -->
                        <div id="error_id_supplier" class="invalid-feedback error_id_supplier">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <button type="button" class="btn btn-danger btn-sm btn-block" id="hapusField"><i class="fas fa-trash"></i></button>
                    </div>    
                </div> 
            `;
            $('#newField').append(newField);
        });
        $("body").on("click", "#hapusField", function() {
            $(this).parents("#tambahanField").remove();
        })



        $('.saveBarang').submit(function(e) {
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