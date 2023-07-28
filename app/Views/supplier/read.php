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
                <th width="55px">Action</th>
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
                    <td width="55px">
                        <a href="" class="btn btn-circle btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="" class="btn btn-circle btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            fixedHeader: {
                header: true,
                footer: true
            },
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excel',
                    text: '<i class="far fa-file-excel" aria-hidden="true"></i> Excel Export',
                    filename: 'Suppliers',
                    title: 'Data Suppliers',
                    exportOptions: {
                        modifier: {
                            search: 'applied',
                            order: 'applied',
                            page: 'current'
                        },
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print" aria-hidden="true"></i> Print',
                    filename: 'Suppliers',
                    title: 'Data Suppliers',
                    exportOptions: {
                        modifier: {
                            search: 'applied',
                            order: 'applied',
                            page: 'current'
                        },
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }
                },
            ],
            responsive: true,
        });
    });
</script>