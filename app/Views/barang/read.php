<div class="table-responsive">
    <table class="table table-hover table-striped table-sm" id="dataTable" width="100%" cellspacing="0" style="font-size: small;">
        <thead>
            <tr>
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
        });
    })
</script>