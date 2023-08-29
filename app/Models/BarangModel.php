<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'barang';
    protected $primaryKey       = 'id_barang';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_barang', 'id_supplier', 'nama_barang', 'id_jenis_barang'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function getBarang()
    {
        $BarangModel = new BarangModel();
        $data = $BarangModel->join('suppliers', 'barang.id_supplier = suppliers.id_supplier', 'left')->join('jenis_barang', 'barang.id_jenis_barang = jenis_barang.id_jenis_barang', 'left')->find();
        return $data;
    }
}
