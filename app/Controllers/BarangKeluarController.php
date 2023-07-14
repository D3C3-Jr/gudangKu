<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangKeluarModel;
use App\Models\BarangModel;

class BarangKeluarController extends BaseController
{

    protected $BarangKeluarModel;
    protected $BarangModel;

    public function index()
    {
        $datas = [
            'title' => 'Data Barang Keluar',
        ];
        return view('barangKeluar/index', $datas);
    }

    public function readBarangKeluar()
    {
        if ($this->request->isAJAX()) {
            $BarangKeluarModel = new BarangKeluarModel();

            $data = [
                'title' => 'Data Barang Keluar',
                'barangKeluars' => $BarangKeluarModel->getBarangKeluar(),
            ];
            $msg = [
                'data' => view('barangKeluar/read', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Oops, Something went Wrong');
        }
    }

    public function addBarangKeluar()
    {
        if ($this->request->isAJAX()) {
            date_default_timezone_set('Asia/Jakarta');
            $BarangModel = new BarangModel();
            $datas = [
                'barangs' => $BarangModel->findAll()
            ];
            $msg = [
                'data' => view('barangKeluar/add', $datas)
            ];
            echo json_encode($msg);
        } else {
            exit('Oops, Something went wrong');
        }
    }

    public function saveBarangKeluar()
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
                    'kode_barang_keluar' => $this->request->getVar('kode_barang_keluar'),
                    'id_barang' => $this->request->getVar('id_barang'),
                    'jumlah' => $this->request->getVar('jumlah'),
                    'tanggal' => $this->request->getVar('tanggal'),
                ];
                $barang = new BarangKeluarModel();
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
