<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'suppliers';
    protected $primaryKey       = 'id_supplier';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_supplier', 'nama_supplier', 'id_jenis_supplier', 'alamat', 'kota', 'telp', 'email'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getSupplier()
    {
        $SupplierModel = new SupplierModel();
        $data = $SupplierModel->join('jenis_supplier', 'jenis_supplier.id_jenis_supplier = suppliers.id_jenis_supplier', 'left')->find();
        return $data;
    }
}
