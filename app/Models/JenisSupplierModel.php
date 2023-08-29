<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisSupplierModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'jenis_supplier';
    protected $primaryKey       = 'id_jenis_supplier';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['jenis_supplier'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getJenisSupplier()
    {
        $JenisSupplierModel = new JenisSupplierModel();
        $data = $JenisSupplierModel->join('suppliers', 'jenis_supplier.id_jenis_supplier = suppliers.id_jenis_supplier', 'left')->find();
        return $data;
    }
}
