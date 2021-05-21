<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Dashboard'];
        echo view('Admin/layouts/header', $data);
        echo view('Admin/index', $data);
        echo view('Admin/layouts/footer');
    }
}
