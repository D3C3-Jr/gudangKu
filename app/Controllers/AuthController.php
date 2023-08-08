<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    public function login()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('auth/login', $data);
    }
}
