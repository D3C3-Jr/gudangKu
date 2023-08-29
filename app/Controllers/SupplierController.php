<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SupplierModel;
use App\Models\JenisSupplierModel;

class SupplierController extends BaseController
{
    protected $SupplierModel;

    public function index()
    {
        $datas = [
            'title' => 'Data Supplier',
            'sidebar' => 'Master'
        ];
        return view('supplier/index', $datas);
    }

    public function readSupplier()
    {
        if ($this->request->isAJAX()) {
            $SupplierModel = new \App\Models\SupplierModel();
            $data = [
                'title' => 'Data Supplier',
                'suppliers' => $SupplierModel->getSupplier(),
            ];
            $msg = [
                'data' => view('supplier/read', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Oops, Something went wrong');
        }
    }

    public function addSupplier()
    {


        if ($this->request->isAJAX()) {
            $JenisSupplierModel = new JenisSupplierModel();
            $datas = [
                'jenis_suppliers' => $JenisSupplierModel->findAll(),
            ];
            $msg = [
                'data' => view('supplier/add', $datas)
            ];
            echo json_encode($msg);
        } else {
            exit('Oops, Something went wrong');
        }
    }

    public function addMultipleSupplier()
    {
        $JenisSupplierModel = new JenisSupplierModel();
        if ($this->request->isAJAX()) {
            $datas = [
                'jenis_suppliers' => $JenisSupplierModel->findAll(),
            ];
            $msg = [
                'data' => view('supplier/add-multiple', $datas)
            ];
            echo json_encode($msg);
        } else {
            exit('Oops, Something went wrong');
        }
    }

    public function saveSupplier()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'kode_supplier' => [
                    'label' => 'Kode Supplier',
                    'rules' => 'required|is_unique[suppliers.kode_supplier]',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                        'is_unique' => '{field} Sudah ada'
                    ]
                ],

                'nama_supplier' => [
                    'label' => 'Nama Supplier',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                    ]
                ],

                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                    ]
                ],

                'kota' => [
                    'label' => 'Kota',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                    ]
                ],

                'telp' => [
                    'label' => 'No Telp',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                    ]
                ],

                'email' => [
                    'label' => 'Email',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'kode_supplier' => $validation->getError('kode_supplier'),
                        'nama_supplier' => $validation->getError('nama_supplier'),
                        'alamat' => $validation->getError('alamat'),
                        'kota' => $validation->getError('kota'),
                        'telp' => $validation->getError('telp'),
                        'email' => $validation->getError('email'),
                    ]
                ];
            } else {
                $save = [
                    'kode_supplier' => $this->request->getVar('kode_supplier'),
                    'nama_supplier' => $this->request->getVar('nama_supplier'),
                    'alamat' => $this->request->getVar('alamat'),
                    'kota' => $this->request->getVar('kota'),
                    'telp' => $this->request->getVar('telp'),
                    'email' => $this->request->getVar('email'),
                    'id_jenis_supplier' => $this->request->getVar('id_jenis_supplier'),
                ];
                $supplier = new SupplierModel();
                $supplier->insert($save);
                $msg = [
                    'success' => 'Data berhasil di tambahkan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Oops, Something went wrong');
        }
    }


    public function saveMultipleSupplier()
    {
        if ($this->request->isAJAX()) {
            $SupplierModel = new SupplierModel();
            $kode_supplier = $this->request->getVar('kode_supplier');
            $nama_supplier = $this->request->getVar('nama_supplier');
            $alamat = $this->request->getVar('alamat');
            $kota = $this->request->getVar('kota');
            $telp = $this->request->getVar('telp');
            $email = $this->request->getVar('email');
            $id_jenis_supplier = $this->request->getVar('id_jenis_supplier');

            $jumlahData = count($kode_supplier);

            for ($i = 0; $i < $jumlahData; $i++) {
                $SupplierModel->insert([
                    'kode_supplier'     => $kode_supplier[$i],
                    'nama_supplier'     => $nama_supplier[$i],
                    'alamat'            => $alamat[$i],
                    'kota'              => $kota[$i],
                    'telp'              => $telp[$i],
                    'email'             => $email[$i],
                    'id_jenis_supplier'    => $id_jenis_supplier[$i],
                ]);
            }
            $msg = [
                'success' => "$jumlahData Data berhasil di simpan"
            ];
            echo json_encode($msg);
        } else {
            exit('Oops, Something went wrong');
        }
    }

    public function deleteSupplier($id_supplier)
    {
        $SupplierModel = new SupplierModel();
        $SupplierModel->delete($id_supplier);

        return $this->response->setJSON(['success' => true]);
    }
}
