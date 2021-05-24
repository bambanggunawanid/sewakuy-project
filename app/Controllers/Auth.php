<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
    }
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        if ($this->form_validation->run() == false) {
            $data = ['title' => 'Login Account'];
            return view('pages/login', $data);
        } else {
            //Ketika Succes... Cara Pak Dika kasih tau func private adalah dengan underskor
            $this->_login();
        }
    }

    // func to login logic
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Jadi ini maksudnya, sebuah query get_where jika email = email pada db maka masuk ke auth/ auth success
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            //user ada
            if ($user['is_active'] == 1) {

                //jika usernya sudah active
                if (password_verify($password, $user['password'])) {

                    //jika benar maka :
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];

                    //memasukkan data ke dalam session
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {

                        //jika dia admin maka
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                    redirect('user');
                } else {

                    //jika salah maka :
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed, Wrong Password!</div>');
                    redirect('auth');
                }
            } else {

                //jika belum maka :
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed, Your Account not Activated</div>');
                redirect('auth');
            }
        } else {

            //user tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed, Your Account not Registered</div>');
            redirect('auth');
        }
    }
}
