<?= form_open('barang/deleteMultipleBarang', ['class' => 'deleteMultipleBarang']); ?>
<!-- <button type="submit" class="btn btn-danger btn-sm mb-2 deleteMultipleBarang" hidden>Hapus Banyak Data</button> -->
<div class="table-responsive">
    <table class="table table-hover table-bordered table-sm" id="dataTable" width="100%" cellspacing="0" style="font-size: small;">
        <thead style="background-color: grey;color:white">
            <tr>
                <!-- <th><input type="checkbox" id="selectAll"></th> -->
                <th width="5px">No</th>
                <th>Kode Barang</th>
                <th>Supplier</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($barangs as $barang) : ?>
                <tr>
                    <!-- <td width="5px"><input type="checkbox" class="checkbox" name="id_barang[]" id="kode_barang" value="<?= $barang['id_barang'] ?>"></td> -->
                    <td width="5px"><?= $no++ ?></td>
                    <td><?= $barang['kode_barang'] ?></td>
                    <td><?= $barang['nama_supplier'] ?></td>
                    <td><?= $barang['nama_barang'] ?></td>
                    <td><?= $barang['jenis_barang'] ?></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-circle btn-sm btn-danger deleteBarang" data-kode_barang="<?= $barang['kode_barang'] ?>" data-id_barang="<?= $barang['id_barang'] ?>"><i class="fa fa-trash"></i></button>
                        <!-- <button type="button" class="btn btn-circle btn-sm btn-info editBarang" data-id_barang="<?= $barang['id_barang'] ?>" data-kode_barang="<?= $barang['kode_barang'] ?>"><i class="fa fa-pencil"></i></button> -->
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= form_close() ?>
</div>

<script>
    $(document).ready(function() {

        // HAPUS BARANG SATUAN
        $('.deleteBarang').click(function() {
            var id_barang = $(this).data('id_barang');
            var kode_barang = $(this).data('kode_barang');
            var urlDelete = "<?= site_url('barang/deleteBarang/'); ?>" + id_barang;

            Swal.fire({
                title: 'Anda yakin?',
                text: `Anda akan menghapus ${kode_barang}`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: urlDelete,
                        type: 'DELETE',
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: `Data berhasil di hapus`,
                                })
                                readBarang();
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                        }
                    });
                }
            })
        });

        // CEKLIS SEMUA DATA
        $('#selectAll').click(function(e) {
            if ($(this).is(':checked')) {
                $('.checkbox').prop('checked', true);
            } else {
                $('.checkbox').prop('checked', false);
            }
        });

        // DELETE BARANG BANYAK
        $('.deleteMultipleBarang').submit(function(e) {
            e.preventDefault();
            let jumlahData = $('.checkbox:checked');

            if (jumlahData.length === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Silahkan pilih data yang akan di hapus',
                })
            } else {
                Swal.fire({
                    title: 'Anda yakin?',
                    text: `Anda akan menghapus ${jumlahData.length} Data`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).attr('action'),
                            data: $(this).serialize(),
                            dataType: "json",
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: `${jumlahData.length} Data berhasil di hapus`,
                                    })
                                    readBarang();
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                            }
                        });
                    }
                })
            }
            return false
        })

        // DATA TABLE
        $('#dataTable').DataTable({
            responsive: true,
            dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [{
                    extend: 'excel',
                    text: '<i class="far fa-file-excel" aria-hidden="true"></i> Excel',
                    filename: 'Barang',
                    title: 'Data Barang',
                    exportOptions: {
                        // modifier: {
                        //     search: 'applied',
                        //     order: 'applied',
                        //     page: 'current'
                        // },
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print" aria-hidden="true"></i> Print',
                    filename: 'Barang',
                    title: '<center>PT. TJFORGE INDONESIA <br> Data Barang<br><hr>',
                    exportOptions: {
                        // modifier: {
                        //     search: 'applied',
                        //     order: 'applied',
                        //     page: 'current'
                        // },
                        columns: [0, 1, 2, 3, 4]
                    }
                },
            ],
            // paging: true,
            // scrollCollapse: false,
            // scrollX: false,
            scrollY: 200
        });

    });
</script>