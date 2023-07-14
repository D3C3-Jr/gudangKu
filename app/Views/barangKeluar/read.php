<div class="table-responsive">
    <table class="table table-hover table-striped table-sm" id="dataTable" width="100%" cellspacing="0" style="font-size: small;">
        <thead>
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
            responsive: true,
        });
    })
</script>