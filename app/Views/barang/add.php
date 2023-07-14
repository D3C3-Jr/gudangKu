<!-- Modal -->
<div class="modal fade" id="addModalBarang" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
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
                    <label for="kode_barang" class="col-sm-2 col-form-label col-form-label-sm">Kode</label>
                    <div class="col-sm-10">
                        <input type="text" name="kode_barang" class="form-control form-control-sm" id="kode_barang" placeholder="Kode Barang">
                        <!-- ERROR FEEDBACK -->
                        <div id="error_kode_barang" class="invalid-feedback error_kode_barang">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="id_supplier" class="col-sm-2 col-form-label col-form-label-sm">Supplier</label>
                    <div class="col-sm-10">
                        <select class="form-control form-control-sm" style="width: 100%;" name="id_supplier" id="id_supplier">
                            <option selected hidden disabled>Pilih Supplier</option>
                            <?php foreach ($suppliers as $supplier) : ?>
                                <option value="<?= $supplier['id_supplier'] ?>"><?= $supplier['kode_supplier'] ?> | <?= $supplier['nama_supplier'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nama_barang" class="col-sm-2 col-form-label col-form-label-sm">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_barang" class="form-control form-control-sm" id="nama_barang" placeholder="Nama barang">
                        <!-- ERROR FEEDBACK -->
                        <div id="error_nama_barang" class="invalid-feedback error_nama_barang">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jenis_barang" class="col-sm-2 col-form-label col-form-label-sm">Jenis</label>
                    <div class="col-sm-10">
                        <select class="form-control form-control-sm" name="jenis_barang" id="jenis_barang">
                            <option selected hidden>Pilih Jenis Barang</option>
                            <option value="Mentah">Mentah</option>
                            <option value="Setengah Jadi">Setengah Jadi</option>
                            <option value="Jadi">Jadi</option>
                        </select>
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
        $('#id_supplier').select2();
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