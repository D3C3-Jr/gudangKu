<!-- Modal -->
<div class="modal fade" id="addModalBarangMasuk" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('barangMasuk/saveBarangMasuk', ['class' => 'saveBarangMasuk']) ?>
            <div class="modal-body">

                <div class="form-group row">
                    <label for="kode_barang_masuk" class="col-sm-3 col-form-label col-form-label-sm">Kode Transaksi</label>
                    <div class="col-sm-9">
                        <input type="text" name="kode_barang_masuk" class="form-control form-control-sm" id="kode_barang_masuk" value="<?= date('YmdHis') ?>" readonly>
                        <!-- ERROR FEEDBACK -->
                        <div id="error_kode_barang_masuk" class="invalid-feedback error_kode_barang_masuk">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="id_supplier" class="col-sm-3 col-form-label col-form-label-sm"><b>Supplier*</b></label>
                    <div class="col-sm-9">
                        <select class="form-control form-control-sm" style="width: 100%;" name="id_supplier" id="id_supplier">
                            <option selected hidden disabled>Pilih Supplier</option>
                            <?php foreach ($suppliers as $supplier) : ?>
                                <option value="<?= $supplier['id_supplier'] ?>"><?= $supplier['nama_supplier'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div id="error_id_supplier" class="invalid-feedback error_id_supplier">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="id_barang" class="col-sm-3 col-form-label col-form-label-sm"><b>Barang*</b></label>
                    <div class="col-sm-9">
                        <select class="form-control form-control-sm" style="width: 100%;" name="id_barang" id="id_barang">
                            <option selected hidden disabled>Pilih Barang</option>
                            <?php foreach ($barangs as $barang) : ?>
                                <option value="<?= $barang['id_barang'] ?>"><?= $barang['kode_barang'] ?> | <?= $barang['nama_barang'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div id="error_id_barang" class="invalid-feedback error_id_barang">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jumlah" class="col-sm-3 col-form-label col-form-label-sm">Jumlah</label>
                    <div class="col-sm-9">
                        <input type="number" name="jumlah" class="form-control form-control-sm" id="jumlah" placeholder="Jumlah">
                        <!-- ERROR FEEDBACK -->
                        <div id="error_jumlah" class="invalid-feedback error_jumlah">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tanggal" class="col-sm-3 col-form-label col-form-label-sm">Tanggal</label>
                    <div class="col-sm-9">
                        <input type="date" name="tanggal" class="form-control form-control-sm" id="tanggal" placeholder="Tanggal">
                        <!-- ERROR FEEDBACK -->
                        <div id="error_tanggal" class="invalid-feedback error_tanggal">
                        </div>
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
        $('#id_barang').select2();
        $('#id_supplier').select2();
        $('.saveBarangMasuk').submit(function(e) {
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

                        if (response.error.id_barang) {
                            $('#id_barang').addClass('is-invalid');
                            $('.error_id_barang').html(response.error.id_barang);
                        } else {
                            $('#id_barang').removeClass('is-invalid');
                            $('.error_id_barang').html();
                        }

                        if (response.error.tanggal) {
                            $('#tanggal').addClass('is-invalid');
                            $('.error_tanggal').html(response.error.tanggal);
                        } else {
                            $('#tanggal').removeClass('is-invalid');
                            $('.error_tanggal').html();
                        }

                        if (response.error.id_supplier) {
                            $('#id_supplier').addClass('is-invalid');
                            $('.error_id_supplier').html(response.error.id_supplier);
                        } else {
                            $('#id_supplier').removeClass('is-invalid');
                            $('.error_id_supplier').html();
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.success,
                        });

                        $('#addModalBarangMasuk').modal('hide');
                        readBarangMasuk();
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