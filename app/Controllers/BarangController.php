<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\SupplierModel;

class BarangController extends BaseController
{
    protected $BarangModel;
    protected $SupplierModel;

    public function index()
    {
        $datas = [
            'title' => 'Data Barang',
            'sidebar' => 'Master'
        ];
        return view('barang/index', $datas);
    }

    public function readBarang()
    {
        if ($this->request->isAJAX()) {
            $BarangModel = new BarangModel();
            $data = [
                'title' => 'Data Barang',
                'barangs' => $BarangModel->getBarang()
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
        date_default_timezone_set('Asia/Jakarta');
        $SupplierModel = new SupplierModel();
        if ($this->request->isAJAX()) {
            $datas = [
                'suppliers' => $SupplierModel->findAll()
            ];
            $msg = [
                'data' => view('barang/add', $datas)
            ];
            echo json_encode($msg);
        } else {
            exit('Oops, Something went wrong');
        }
    }

    public function addMultipleBarang()
    {
        date_default_timezone_set('Asia/Jakarta');
        $SupplierModel = new SupplierModel();
        if ($this->request->isAJAX()) {
            $datas = [
                'suppliers' => $SupplierModel->findAll()
            ];
            $msg = [
                'data' => view('barang/add-multiple', $datas)
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

                'id_supplier' => [
                    'label' => 'Supplier',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                    ]
                ],

                'jenis_barang' => [
                    'label' => 'Jenis Barang',
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
                        'id_supplier' => $validation->getError('id_supplier'),
                        'jenis_barang' => $validation->getError('jenis_barang'),
                    ]
                ];
            } else {
                $save = [
                    'kode_barang' => $this->request->getVar('kode_barang'),
                    'id_supplier' => $this->request->getVar('id_supplier'),
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

    public function saveMultipleBarang()
    {
        $BarangModel = new BarangModel();
        if ($this->request->isAJAX()) {
            $kode_barang = $this->request->getVar('kode_barang');
            $id_supplier = $this->request->getVar('id_supplier');
            $nama_barang = $this->request->getVar('nama_barang');
            $jenis_barang = $this->request->getVar('jenis_barang');

            $jumlahData = count($kode_barang);

            for ($i = 0; $i < $jumlahData; $i++) {
                $BarangModel->insert([
                    'kode_barang' => $kode_barang[$i],
                    'id_supplier' => $id_supplier[$i],
                    'nama_barang' => $nama_barang[$i],
                    'jenis_barang' => $jenis_barang[$i],
                ]);
            }
            $msg = [
                'success' => "$jumlahData Berhasil di simpan"
            ];
            echo json_encode($msg);
        } else {
            exit('Oops, Something went wrong');
        }
    }
}
