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
    public function create()
    {
        $data = [
            'title' => 'Upload new Product',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/upload-product', $data);
    }
    public function save()
    {
        // Validation input create product form
        if (!$this->validate([
            'image_1' => 'required',
            'image_2' => 'required',
            'image_3' => 'required',
            'product_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Product name cannot be empty'
                ],
            ],
            'stock' => 'required',
            'weight' => 'required',
        ])){
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/create')->withInput()->with('validation',$validation);
        }
        $this->productModel->save([
            'uuid' => md5(uniqid(time())),
            'name' => $this->request->getVar('product_name'),
            'price' => $this->request->getVar('product_price'),
            'image1' => $this->request->getVar('image_1'),
            'image2' => $this->request->getVar('image_2'),
            'image3' => $this->request->getVar('image_3'),
            'descriptions' => $this->request->getVar('product_descriptions'),
            'category' => $this->request->getVar('choose_category'),
            'stock' => $this->request->getVar('product_stock'),
            'condition_product' => $this->request->getVar('product_condition'),
        ]);
        session()->setFlashdata('pesan', 'New product has created');
        return redirect()->to('/admin');
    }
}
