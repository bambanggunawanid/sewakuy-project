<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Login Account', 'validation' => \Config\Services::validation()];
        return view('pages/login', $data);
    }
    public function login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        if (!$this->validate([
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Product name cannot be empty',
                ],
            ],
            'password' => 'required',
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/login')->withInput()->with('validation', $validation);
        }
        session();
        // $_SESSION['id'] =
        return redirect()->to('/');
    }
    public function register()
    {
        $data = ['title' => 'Register Account', 'validation' => \Config\Services::validation()];

        return view('pages/create-account', $data);
    }
    public function forgotPassword()
    {
        $data = ['title' => 'Forgot Password'];
        return view('pages/forgot-password', $data);
    }
    public function createAccount()
    {
        //set rules validation form
        $rules = [
            'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[6]|max_length[200]',
            'confpassword'  => 'matches[password]'
        ];
        if (!$this->validate($rules)) {
            $validation = \Config\Services::validation();
            return redirect()->to('/register')->withInput()->with('validation', $validation);
        }
        $this->usersModel->save([
            'email'    => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ]);
        session()->setFlashdata('pesan', 'New account has created');
        return redirect()->to('/login');
    }
}
