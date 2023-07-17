<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $datas = [
            'title' => 'Home',
        ];
        return view('home/index', $datas);
    }
}
