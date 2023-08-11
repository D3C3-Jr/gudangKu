<div class="table-responsive">
    <table class="table table-hover table-bordered table-sm" id="dataTable" width="100%" cellspacing="0" style="font-size: small;">
        <thead style="background-color: grey;color:white">
            <tr>
                <th><input type="checkbox" id="selectAll"></th>
                <th width="5px">No</th>
                <th>Kode Barang</th>
                <th>Supplier</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($barangs as $barang) : ?>
                <tr>
                    <td width="5px"><input type="checkbox" class="checkbox"></td>
                    <td width="5px"><?= $no++ ?></td>
                    <td><?= $barang['kode_barang'] ?></td>
                    <td><?= $barang['nama_supplier'] ?></td>
                    <td><?= $barang['nama_barang'] ?></td>
                    <td><?= $barang['jenis_barang'] ?></td>
                    <td>
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
            responsive: true,

            // fixedHeader: {
            //     header: true,
            //     footer: true
            // },
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excel',
                    text: '<i class="far fa-file-excel" aria-hidden="true"></i> Excel',
                    filename: 'Barang',
                    title: 'Data Barang',
                    exportOptions: {
                        modifier: {
                            search: 'applied',
                            order: 'applied',
                            page: 'current'
                        },
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print" aria-hidden="true"></i> Print',
                    filename: 'Barang',
                    title: '<center>PT. TJFORGE INDONESIA <br> Data Barang<br><hr>',
                    exportOptions: {
                        modifier: {
                            search: 'applied',
                            order: 'applied',
                            page: 'current'
                        },
                        columns: [0, 1, 2, 3, 4]
                    }
                },
            ],
            // paging: true,
            // scrollCollapse: false,
            // scrollX: false,
            // scrollY: 400
        });
    });
</script>