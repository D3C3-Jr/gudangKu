<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('supplier/saveSupplier', ['class' => 'saveSupplier']) ?>
            <div class="modal-body">

                <div class="form-group row">
                    <label for="kode_supplier" class="col-sm-2 col-form-label col-form-label-sm">Kode</label>
                    <div class="col-sm-10">
                        <input type="text" name="kode_supplier" class="form-control form-control-sm" id="kode_supplier" placeholder="Kode Supplier">
                        <!-- ERROR FEEDBACK -->
                        <div id="error_kode_supplier" class="invalid-feedback error_kode_supplier">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nama_supplier" class="col-sm-2 col-form-label col-form-label-sm">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_supplier" class="form-control form-control-sm" id="nama_supplier" placeholder="Nama Supplier">
                        <!-- ERROR FEEDBACK -->
                        <div id="error_nama_supplier" class="invalid-feedback error_nama_supplier">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label col-form-label-sm">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" name="alamat" class="form-control form-control-sm" id="alamat" placeholder="Alamat">
                        <!-- ERROR FEEDBACK -->
                        <div id="error_alamat" class="invalid-feedback error_alamat">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="kota" class="col-sm-2 col-form-label col-form-label-sm">Kota</label>
                    <div class="col-sm-10">
                        <input type="text" name="kota" class="form-control form-control-sm" id="kota" placeholder="Kota">
                        <!-- ERROR FEEDBACK -->
                        <div id="error_kota" class="invalid-feedback error_kota">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="telp" class="col-sm-2 col-form-label col-form-label-sm">Nomor</label>
                    <div class="col-sm-10">
                        <input type="text" name="telp" class="form-control form-control-sm" id="telp" placeholder="Nomor Telp">
                        <!-- ERROR FEEDBACK -->
                        <div id="error_telp" class="invalid-feedback error_telp">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control form-control-sm" id="email" placeholder="Email">
                        <!-- ERROR FEEDBACK -->
                        <div id="error_email" class="invalid-feedback error_email">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jenis_supplier" class="col-sm-2 col-form-label col-form-label-sm">Jenis</label>
                    <div class="col-sm-10">
                        <select class="form-control form-control-sm" name="jenis_supplier" id="jenis_supplier">
                            <option selected hidden>Pilih Jenis Supplier</option>
                            <option value="Barang">Barang</option>
                            <option value="Jasa">Jasa</option>
                            <option value="Barang & Jasa">Barang & Jasa</option>
                        </select>
                    </div>
                </div>
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