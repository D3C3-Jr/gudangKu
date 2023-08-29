<div class="table-responsive">
    <table class="table table-hover table-bordered table-sm" id="dataTable" width="100%" cellspacing="0" style="font-size: small;">
        <thead>
            <tr style="background-color: grey;color:white">
                <th width="5px">No</th>
                <th>Kode Supplier</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>No Telp</th>
                <th>Email</th>
                <th>Jenis Supplier</th>
                <th width="55px" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($suppliers as $supplier) : ?>
                <tr>
                    <td width="5px"><?= $no++ ?></td>
                    <td><?= $supplier['kode_supplier'] ?></td>
                    <td><?= $supplier['nama_supplier'] ?></td>
                    <td><?= $supplier['alamat'] ?></td>
                    <td><?= $supplier['kota'] ?></td>
                    <td><?= $supplier['telp'] ?></td>
                    <td><?= $supplier['email'] ?></td>
                    <td><?= $supplier['jenis_supplier'] ?></td>
                    <td width="55px" class="text-center">
                        <!-- <a href="" class="btn btn-circle btn-sm btn-primary"><i class="fas fa-edit"></i></a> -->
                        <button type="button" class="btn btn-circle btn-sm btn-danger deleteSupplier" data-kode_supplier="<?= $supplier['kode_supplier'] ?>" data-id_supplier="<?= $supplier['id_supplier'] ?>"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('.deleteSupplier').click(function() {
            var id_supplier = $(this).data('id_supplier');
            var kode_supplier = $(this).data('kode_supplier');
            var urlDelete = "<?= site_url('supplier/deleteSupplier/'); ?>" + id_supplier;

            Swal.fire({
                title: 'Anda yakin?',
                text: `Anda akan menghapus ${kode_supplier}`,
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
                                readSuppliers();
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
                    filename: 'Suppliers',
                    title: 'Data Suppliers',
                    columns: [0, 1, 2, 3, 4, 5, 6, 7],
                    exportOptions: {
                        // modifier: {
                        //     search: 'applied',
                        //     order: 'applied',
                        //     page: 'current'
                        // },
                    }
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print" aria-hidden="true"></i> Print',
                    filename: 'Suppliers',
                    title: 'Data Suppliers',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7],
                        // modifier: {
                        //     search: 'applied',
                        //     order: 'applied',
                        //     page: 'current'
                        // },
                    }
                },
            ],
            responsive: true,
            scrollY: 300,

        });
    });
</script>