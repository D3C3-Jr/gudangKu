<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PersediaanModel;

class PersediaanController extends BaseController
{
    protected $PersediaanModel;

    public function index()
    {
        $datas = [
            'title' => 'Data Persediaan'
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
}
