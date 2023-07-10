<div class="table-responsive">
    <table class="table table-hover table-striped table-sm" id="dataTable" width="100%" cellspacing="0" style="font-size: small;">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Supplier</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>No Telp</th>
                <th>Email</th>
                <th>Jenis Supplier</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($suppliers as $supplier) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $supplier['kode_supplier'] ?></td>
                    <td><?= $supplier['nama_supplier'] ?></td>
                    <td><?= $supplier['alamat'] ?></td>
                    <td><?= $supplier['kota'] ?></td>
                    <td><?= $supplier['telp'] ?></td>
                    <td><?= $supplier['email'] ?></td>
                    <td><?= $supplier['jenis_supplier'] ?></td>
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