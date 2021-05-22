<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Sewakuy App'];
        echo view('pages/index', $data);
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
