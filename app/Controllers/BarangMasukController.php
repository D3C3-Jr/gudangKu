<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangMasukModel;

class BarangMasukController extends BaseController
{
    protected $BarangMasukModel;

    public function index()
    {
        $datas = [
            'title' => 'Data Barang Masuk',
        ];
        return view('barangMasuk/index', $datas);
    }

    public function readBarangMasuk()
    {
        if ($this->request->isAJAX()) {
            $BarangMasukModel = new BarangMasukModel();
            $data = [
                'title' => 'Data Barang Masuk',
                'barangMasuks' => $BarangMasukModel->findAll()
            ];
            $msg = [
                'data' => view('barangMasuk/read', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Oops, Something went Wrong');
        }
    }
}
