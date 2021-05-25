<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Dashboard'];
        echo view('admin/index', $data);
    }
    public function orders()
    {
        $data = ['title' => 'Orders'];
        echo view('admin/orders', $data);
    }
    public function product()
    {
        $data = ['title' => 'Product'];
        echo view('admin/product', $data);
    }
    public function promotion()
    {
        $data = ['title' => 'Promotion'];
        echo view('admin/promotion', $data);
    }
    public function wallet()
    {
        $data = ['title' => 'My Wallet'];
        echo view('admin/wallet', $data);
    }

    public function create(){
        $data = [
            'title'=> 'Upload new Product'
        ];
        return view('admin/upload-product',$data);
    }
}
