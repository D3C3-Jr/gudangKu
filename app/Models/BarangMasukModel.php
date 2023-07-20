<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangMasukModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'barang_masuk';
    protected $primaryKey       = 'id_barang_masuk';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_barang', 'kode_barang_masuk', 'tanggal', 'jumlah'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getBarangMasuk()
    {
        $BarangMasukModel = new BarangMasukModel();
        $data = $BarangMasukModel->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'left')->orderBy('id_barang_masuk', 'DESC')->find();
        return $data;
    }
}
