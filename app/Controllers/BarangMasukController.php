<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangMasukModel;
use App\Models\BarangModel;
use App\Models\SupplierModel;

class BarangMasukController extends BaseController
{
    protected $BarangMasukModel;
    protected $BarangModel;
    protected $SupplierModel;

    public function index()
    {
        $datas = [
            'title' => 'Data Barang Masuk',
            'sidebar' => 'Transaksi'
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
            $SupplierModel = new SupplierModel();
            $datas = [
                'barangs' => $BarangModel->findAll(),
                'suppliers' => $SupplierModel->findAll(),
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

                'jumlah' => [
                    'label' => 'Jumlah',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                        'numeric' => '{field} Harus angka'
                    ]
                ],

                'id_barang' => [
                    'label' => 'Barang',
                    'rules' => 'required|is_not_unique[persediaan.id_barang]',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                        'is_not_unique' => '{field} Belum ada di data Persediaan, Silahkan isi terlebih dahulu di Persediaan'
                    ]
                ],

                'tanggal' => [
                    'label' => 'Tanggal',
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

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'jumlah' => $validation->getError('jumlah'),
                        'id_barang' => $validation->getError('id_barang'),
                        'tanggal' => $validation->getError('tanggal'),
                        'id_supplier' => $validation->getError('id_supplier'),
                    ]
                ];
            } else {
                $save = [
                    'kode_barang_masuk' => $this->request->getVar('kode_barang_masuk'),
                    'id_barang' => $this->request->getVar('id_barang'),
                    'jumlah' => $this->request->getVar('jumlah'),
                    'tanggal' => $this->request->getVar('tanggal'),
                    'id_supplier' => $this->request->getVar('id_supplier'),
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
