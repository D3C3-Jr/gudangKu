<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangMasukModel;
use App\Models\BarangModel;

class BarangMasukController extends BaseController
{
    protected $BarangMasukModel;
    protected $BarangModel;

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
                'barangMasuks' => $BarangMasukModel->getBarangMasuk(),
            ];
            $msg = [
                'data' => view('barangMasuk/read', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Oops, Something went Wrong');
        }
    }

    public function addBarangMasuk()
    {
        if ($this->request->isAJAX()) {
            date_default_timezone_set('Asia/Jakarta');
            $BarangModel = new BarangModel();
            $datas = [
                'barangs' => $BarangModel->findAll()
            ];
            $msg = [
                'data' => view('barangMasuk/add', $datas)
            ];
            echo json_encode($msg);
        } else {
            exit('Oops, Something went wrong');
        }
    }

    public function saveBarangMasuk()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([

                'id_barang' => [
                    'label' => 'Kode Barang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'id_barang' => $validation->getError('id_barang'),
                    ]
                ];
            } else {
                $save = [
                    'kode_barang_masuk' => $this->request->getVar('kode_barang_masuk'),
                    'id_barang' => $this->request->getVar('id_barang'),
                    'jumlah' => $this->request->getVar('jumlah'),
                    'tanggal' => $this->request->getVar('tanggal'),
                ];
                $barang = new BarangMasukModel();
                $barang->insert($save);
                $msg = [
                    'success' => 'Data berhasil di tambahkan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Oops, Something went wrong');
        }
    }
}
