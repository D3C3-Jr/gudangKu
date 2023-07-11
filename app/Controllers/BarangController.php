<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;

class BarangController extends BaseController
{
    protected $BarangModel;

    public function index()
    {
        $datas = [
            'title' => 'Data Barang'
        ];
        return view('barang/index', $datas);
    }

    public function readBarang()
    {
        if ($this->request->isAJAX()) {
            $BarangModel = new BarangModel();
            $data = [
                'title' => 'Data Barang',
                'barangs' => $BarangModel->findAll()
            ];
            $msg = [
                'data' => view('barang/read', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Oops, Something went wrong');
        }
    }

    public function addBarang()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('barang/add')
            ];
            echo json_encode($msg);
        } else {
            exit('Oops, Something went wrong');
        }
    }

    public function saveBarang()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'kode_barang' => [
                    'label' => 'Kode Barang',
                    'rules' => 'required|is_unique[barang.kode_barang]',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                        'is_unique' => '{field} Sudah ada'
                    ]
                ],

                'nama_barang' => [
                    'label' => 'Nama Barang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'kode_barang' => $validation->getError('kode_barang'),
                        'nama_barang' => $validation->getError('nama_barang'),
                    ]
                ];
            } else {
                $save = [
                    'kode_barang' => $this->request->getVar('kode_barang'),
                    'nama_barang' => $this->request->getVar('nama_barang'),
                    'jenis_barang' => $this->request->getVar('jenis_barang'),
                ];
                $barang = new BarangModel();
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
