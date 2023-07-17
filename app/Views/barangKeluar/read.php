<div class="table-responsive">
    <table class="table table-hover table-bordered table-sm" id="dataTable" width="100%" cellspacing="0" style="font-size: small;">
        <thead style="background-color: grey;color:white">
            <tr>
                <th>No</th>
                <th>Kode Transaksi</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($barangKeluars as $barangKeluar) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $barangKeluar['kode_barang_keluar'] ?></td>
                    <td><?= $barangKeluar['kode_barang'] ?></td>
                    <td><?= $barangKeluar['nama_barang'] ?></td>
                    <td><?= $barangKeluar['jenis_barang'] ?></td>
                    <td><?= date('Y-m-d', strtotime($barangKeluar['tanggal'])) ?></td>
                    <td><?= $barangKeluar['jumlah'] ?></td>
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
            fixedHeader: {
                header: true,
                footer: true
            },
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excel',
                    text: '<i class="far fa-file-excel" aria-hidden="true"></i> Excel Export',
                    filename: 'Barang Keluar',
                    title: 'Data Barang Keluar',
                    exportOptions: {
                        modifier: {
                            search: 'applied',
                            order: 'applied',
                            page: 'current'
                        },
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print" aria-hidden="true"></i> Print',
                    filename: 'Barang Keluar',
                    title: 'Data Barang Keluar',
                    exportOptions: {
                        modifier: {
                            search: 'applied',
                            order: 'applied',
                            page: 'current'
                        },
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
            ],
            responsive: true,
            paging: false,
            scrollCollapse: true,
            scrollX: true,
            scrollY: 400
        });
    });
</script>