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
                <small class="text-danger">1. Kode Barang tidak boleh sama</small>
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
                            <td><input type="text" name="kode_barang[]" class="form-control form-control-sm" required></td>
                            <td>
                                <select class="form-control form-control-sm id_supplier" style="width: 100%;" name="id_supplier[]" id="id_supplier">
                                    <option selected hidden disabled>Pilih Supplier</option>
                                    <?php $no = 1;
                                    foreach ($suppliers as $supplier) : ?>
                                        <option value="<?= $supplier['id_supplier'] ?>"><?= $no++ ?>. <?= $supplier['nama_supplier'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td><input type="text" name="nama_barang[]" class="form-control form-control-sm"></td>
                            <td>
                                <select class="form-control form-control-sm" name="id_jenis_barang[]" id="id_jenis_barang">
                                    <option selected hidden disabled>Pilih Jenis Barang</option>
                                    <?php foreach ($jenis_barangs as $jenis_barang) : ?>
                                        <option value="<?= $jenis_barang['id_jenis_barang'] ?>"><?= $jenis_barang['jenis_barang'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
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

        // $('.id_supplier').select2();

        $('#tambahField').click(function() {
            var tambahanField = `
            <tr id="fieldTambahan">
                <td><input type="text" name="kode_barang[]" class="form-control form-control-sm" required></td>
                <td>
                    <select class="form-control form-control-sm id_supplier" style="width: 100%;" name="id_supplier[]" id="id_supplier1">
                        <option selected hidden disabled>Pilih Supplier</option>
                        <?php $no = 1;
                        foreach ($suppliers as $supplier) : ?>
                                <option value="<?= $supplier['id_supplier'] ?>"><?= $no++ ?>. <?= $supplier['nama_supplier'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td><input type="text" name="nama_barang[]" class="form-control form-control-sm"></td>
                <td>
                    <select class="form-control form-control-sm" name="id_jenis_barang[]" id="id_jenis_barang">
                        <option selected hidden disabled>Pilih Jenis Barang</option>
                        <?php foreach ($jenis_barangs as $jenis_barang) : ?>
                            <option value="<?= $jenis_barang['id_jenis_barang'] ?>"><?= $jenis_barang['jenis_barang'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td><button type="button" id="hapusField" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
            </tr>
            `;
            // $('.id_supplier').select2();
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
                    if (response.success) {
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
                    // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr.status + "\n" + xhr.responseText + "\n" + thrownError,
                    });
                    $('#addModalBarang').modal('hide');
                    readBarang();
                }
            });
            return false;
        });
    })
</script>