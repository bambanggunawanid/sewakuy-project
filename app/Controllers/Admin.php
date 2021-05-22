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
    public function login()
    {
        $data = ['title' => 'Login Account'];
        return view('pages/login',$data);
    }
    public function register()
    {
        $data = ['title' => 'Register Account'];
        return view('pages/create-account',$data);
    }
    public function forgotPassword()
    {
        $data = ['title' => 'Forgot Password'];
        return view('pages/forgot-password',$data);
    }
}
