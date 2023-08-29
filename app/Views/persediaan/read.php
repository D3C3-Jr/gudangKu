<!-- <button class="btn btn-sm btn-info mb-2" id="changeToTable"><i class="fa fa-list"></i></button> -->
<!-- <button class="btn btn-sm btn-info mb-2" id="changeToCard"><i class="fa fa-table"></i></button> -->

<div class="table-responsive" id="table">
    <table class="table table-hover table-bordered table-sm" id="dataTable" width="100%" cellspacing="0" style="font-size: small;">
        <thead style="background-color: grey;color:white">
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <!-- <th class="text-center">Action</th> -->
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($persediaans as $persediaan) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $persediaan['kode_barang'] ?></td>
                    <td><?= $persediaan['nama_barang'] ?></td>
                    <td><?= $persediaan['jumlah'] ?></td>
                    <!-- <td class="text-center">
                        <button type="button" class="btn btn-circle btn-sm btn-danger deletePersediaan" data-id_persediaan="<?= $persediaan['id_persediaan'] ?>"><i class="fa fa-trash"></i></button>
                    </td> -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="row mb-2" id="card" hidden>
    <?php foreach ($persediaans as $persediaan) : ?>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $persediaan['kode_barang'] ?></h5>
                    <p class="card-text"><?= $persediaan['nama_barang'] ?></p>
                    <a href="#" class="btn btn-primary"><?= $persediaan['jumlah'] ?></a>
                    <!-- <button type="button" class="btn btn-circle btn-sm btn-danger deletePersediaan" data-id_persediaan="<?= $persediaan['id_persediaan'] ?>"><i class="fa fa-trash"></i></button> -->
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


<script>
    $(document).ready(function() {
        $('#changeToCard').click(function() {
            $('#card').removeAttr('hidden');
            $('#table').attr('hidden', true);
        });

        // HAPUS BARANG SATUAN
        $('.deletePersediaan').click(function() {
            var id_persediaan = $(this).data('id_persediaan');
            var urlDelete = "<?= site_url('persediaan/deletePersediaan/'); ?>" + id_persediaan;

            Swal.fire({
                title: 'Anda yakin?',
                text: `Anda akan menghapus Data ${id_persediaan}`,
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
                                readPersediaan();
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                        }
                    });
                }
            })
        });

        $('#dataTable').DataTable({

            dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [{
                    extend: 'excel',
                    text: '<i class="far fa-file-excel" aria-hidden="true"></i> Excel',
                    filename: 'Persediaan',
                    title: 'Data Persediaan',
                    exportOptions: {
                        modifier: {
                            search: 'applied',
                            order: 'applied',
                            page: 'current'
                        },
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print" aria-hidden="true"></i> Print',
                    filename: 'Persediaan',
                    title: 'Data Persediaan',
                    exportOptions: {
                        modifier: {
                            search: 'applied',
                            order: 'applied',
                            page: 'current'
                        },
                        columns: [0, 1, 2, 3]
                    }
                },
            ],
            // responsive: true,
            // paging: false,
            // scrollCollapse: true,
            // scrollX: true,
            // scrollY: 200
        });
    });
</script>