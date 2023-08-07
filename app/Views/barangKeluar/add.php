<!-- Modal -->
<div class="modal fade" id="addModalBarangKeluar" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('barangKeluar/saveBarangKeluar', ['class' => 'saveBarangKeluar']) ?>
            <div class="modal-body">

                <div class="form-group row">
                    <label for="kode_barang_keluar" class="col-sm-3 col-form-label col-form-label-sm">Kode Transaksi</label>
                    <div class="col-sm-9">
                        <input type="text" name="kode_barang_keluar" class="form-control form-control-sm" id="kode_barang_keluar" value="<?= date('YmdHis') ?>" readonly>
                        <!-- ERROR FEEDBACK -->
                        <div id="error_kode_barang_keluar" class="invalid-feedback error_kode_barang_keluar">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="id_barang" class="col-sm-3 col-form-label col-form-label-sm">Kode Barang</label>
                    <div class="col-sm-9">
                        <select class="form-control form-control-sm" style="width: 100%;" name="id_barang" id="id_barang">
                            <option selected hidden>Pilih Barang</option>
                            <?php foreach ($persediaans as $persediaan) : ?>
                                <option value="<?= $persediaan['id_barang'] ?>"><?= $persediaan['kode_barang'] ?> | <?= $persediaan['nama_barang'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="stok" class="col-sm-3 col-form-label col-form-label-sm">Stok</label>
                    <div class="col-sm-9">
                        <p class="stok" id="stok"></p>
                        <!-- ERROR FEEDBACK -->
                        <div id="error_jumlah" class="invalid-feedback error_jumlah">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jumlah" class="col-sm-3 col-form-label col-form-label-sm">Jumlah</label>
                    <div class="col-sm-9">
                        <input type="text" name="jumlah" class="form-control form-control-sm" id="jumlah" placeholder="Jumlah">


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

        $('#id_barang').change(function() {
            // alert("Berhasil");
            var id_barang = $(this).val();

            $.ajax({
                url: '<?= base_url() ?>/barangKeluar/getStok',
                method: 'POST',
                data: {
                    id_barang: id_barang
                },
                dataType: 'json',
                success: function(response) {
                    // $('#sel_depart').find('option').not(':first').remove();

                    $.each(response, function(index, data) {
                        $("#stok").append(data['jumlah']);
                        // $("#stok").remove();
                    })
                }
            });
        });

        $('.saveBarangKeluar').submit(function(e) {
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

                        $('#addModalBarangKeluar').modal('hide');
                        readBarangKeluar();
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