<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PersediaanModel;
use App\Models\BarangModel;

class PersediaanController extends BaseController
{
    protected $PersediaanModel;
    protected $BarangModel;

    public function index()
    {
        $datas = [
            'title' => 'Data Persediaan',
            'sidebar' => ''
        ];
        return view('persediaan/index', $datas);
    }

    public function readPersediaan()
    {
        if ($this->request->isAJAX()) {
            $PersediaanModel = new PersediaanModel();
            $data = [
                'title' => 'Data Persediaan',
                'persediaans' => $PersediaanModel->getPersediaan()
            ];
            $msg = [
                'data' => view('Persediaan/read', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Oops, Something went wrong');
        }
    }

    public function addPersediaan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $BarangModel = new BarangModel();
        if ($this->request->isAJAX()) {
            $datas = [
                'barangs' => $BarangModel->findAll()
            ];
            $msg = [
                'data' => view('persediaan/add', $datas)
            ];
            echo json_encode($msg);
        } else {
            exit('Oops, Something went wrong');
        }
    }

    public function savePersediaan()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'jumlah' => [
                    'label' => 'Jumlah',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                        'numeric' => '{field} Harus Angka',
                    ]
                ],

                'id_barang' => [
                    'label' => 'Barang',
                    'rules' => 'required|is_unique[persediaan.id_barang]',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                        'is_unique' => '{field} Sudah ada, silahkan input di Barang Masuk'
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'jumlah' => $validation->getError('jumlah'),
                        'id_barang' => $validation->getError('id_barang'),
                    ]
                ];
            } else {
                $save = [
                    'id_barang' => $this->request->getVar('id_barang'),
                    'jumlah' => $this->request->getVar('jumlah'),
                ];
                $persediaan = new PersediaanModel();
                $persediaan->insert($save);
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
