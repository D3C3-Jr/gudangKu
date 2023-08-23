<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PersediaanModel;
use App\Models\BarangModel;
use App\Models\SupplierModel;

class HomeController extends BaseController
{
    protected $Persediaan;
    protected $Barang;
    protected $Supplier;

    public function index()
    {
        $Persediaan = new PersediaanModel();
        $Barang = new BarangModel();
        $Supplier = new SupplierModel();

        $datas = [
            'persediaans' => $Persediaan->countAllResults(),
            'barangs' => $Barang->countAllResults(),
            'suppliers' => $Supplier->countAllResults(),
            'title' => 'Home',
            'sidebar' => ''
        ];
        return view('home/index', $datas);
    }
}
