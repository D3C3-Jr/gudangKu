<div class="table-responsive">
    <table class="table table-hover table-striped table-sm" id="dataTable" width="100%" cellspacing="0" style="font-size: small;">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Barang</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($barangMasuks as $barangMasuk) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $barangMasuk['id_barang'] ?></td>
                    <td><?= $barangMasuk['tanggal'] ?></td>
                    <td><?= $barangMasuk['jumlah'] ?></td>
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