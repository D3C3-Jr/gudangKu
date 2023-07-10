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

    // public function addSupplier()
    // {
    //     if ($this->request->isAJAX()) {
    //         $msg = [
    //             'data' => view('supplier/add')
    //         ];
    //         echo json_encode($msg);
    //     } else {
    //         exit('Oops, Something went wrong');
    //     }
    // }

    // public function saveSupplier()
    // {
    //     if ($this->request->isAJAX()) {
    //         $validation = \Config\Services::validation();
    //         $valid = $this->validate([
    //             'kode_supplier' => [
    //                 'label' => 'Kode Supplier',
    //                 'rules' => 'required|is_unique[suppliers.kode_supplier]',
    //                 'errors' => [
    //                     'required' => '{field} Harus diisi',
    //                     'is_unique' => '{field} Sudah ada'
    //                 ]
    //             ],

    //             'nama_supplier' => [
    //                 'label' => 'Nama Supplier',
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} Harus diisi',
    //                 ]
    //             ],

    //             'alamat' => [
    //                 'label' => 'Alamat',
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} Harus diisi',
    //                 ]
    //             ],

    //             'kota' => [
    //                 'label' => 'Kota',
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} Harus diisi',
    //                 ]
    //             ],

    //             'telp' => [
    //                 'label' => 'No Telp',
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} Harus diisi',
    //                 ]
    //             ],

    //             'email' => [
    //                 'label' => 'Email',
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} Harus diisi',
    //                 ]
    //             ],
    //         ]);
    //         if (!$valid) {
    //             $msg = [
    //                 'error' => [
    //                     'kode_supplier' => $validation->getError('kode_supplier'),
    //                     'nama_supplier' => $validation->getError('nama_supplier'),
    //                     'alamat' => $validation->getError('alamat'),
    //                     'kota' => $validation->getError('kota'),
    //                     'telp' => $validation->getError('telp'),
    //                     'email' => $validation->getError('email'),
    //                 ]
    //             ];
    //         } else {
    //             $save = [
    //                 'kode_supplier' => $this->request->getVar('kode_supplier'),
    //                 'nama_supplier' => $this->request->getVar('nama_supplier'),
    //                 'alamat' => $this->request->getVar('alamat'),
    //                 'kota' => $this->request->getVar('kota'),
    //                 'telp' => $this->request->getVar('telp'),
    //                 'email' => $this->request->getVar('email'),
    //                 'jenis_supplier' => $this->request->getVar('jenis_supplier'),
    //             ];
    //             $supplier = new SupplierModel();
    //             $supplier->insert($save);
    //             $msg = [
    //                 'success' => 'Data berhasil di tambahkan'
    //             ];
    //         }
    //         echo json_encode($msg);
    //     } else {
    //         exit('Oops, Something went wrong');
    //     }
    // }
}
