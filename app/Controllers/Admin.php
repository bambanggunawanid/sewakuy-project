<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        if (!session()->has('logged_in')) {
            return redirect()->to('/login');
        }
        $data = [
            'title' => 'Dashboard',
            'products' => $this->productModel->getProduct(),
            'Allusers' => $this->usersModel->getUser(),
            'user' => $this->usersModel->getUser(session('id')),
            'adminProduct' => $this->usersModel->joinProduct(session('id'))
        ];
        echo view('admin/index', $data);
    }
    public function orders()
    {
        if (!session()->has('logged_in')) {
            return redirect()->to('/login');
        }
        $data = ['title' => 'Orders'];
        echo view('admin/orders', $data);
    }
    public function product()
    {
        if (!session()->has('logged_in')) {
            return redirect()->to('/login');
        }
        $data = ['title' => 'Product', 'adminProduct' => $this->usersModel->joinProduct(session('id'))];
        echo view('admin/product', $data);
    }
    public function promotion()
    {
        if (!session()->has('logged_in')) {
            return redirect()->to('/login');
        }
        $data = ['title' => 'Promotion'];
        echo view('admin/promotion', $data);
    }
    public function wallet()
    {
        if (!session()->has('logged_in')) {
            return redirect()->to('/login');
        }
        $data = ['title' => 'My Wallet'];
        echo view('admin/wallet', $data);
    }
    public function create()
    {
        if (!session()->has('logged_in')) {
            return redirect()->to('/login');
        }
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
            'image_1' => [
                'rules' => 'uploaded[image_1]|max_size[image_1,1024]|is_image[image_1]|mime_in[image_1,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'images must be uploaded',
                    'max_size' => 'file size is over weight',
                    'is_image' => 'file not an image',
                    'mime_in' => 'file not an image',
                ]
            ],
            'image_2' => [
                'rules' => 'uploaded[image_1]|max_size[image_1,1024]|is_image[image_1]|mime_in[image_1,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'images must be uploaded',
                    'max_size' => 'file size is over weight',
                    'is_image' => 'file not an image',
                    'mime_in' => 'file not an image',
                ]
            ],
            'image_3' => [
                'rules' => 'uploaded[image_1]|max_size[image_1,1024]|is_image[image_1]|mime_in[image_1,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'images must be uploaded',
                    'max_size' => 'file size is over weight',
                    'is_image' => 'file not an image',
                    'mime_in' => 'file not an image',
                ]
            ],
            'product_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Product name cannot be empty',
                ],
            ],
            'product_descriptions' => 'required',
            'product_price' => 'required',
            'product_stock' => 'required',
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/admin/create')->withInput()->with('validation', $validation);
            return redirect()->to('/admin/create')->withInput();
        }
        // take picture
        $fileImage = $this->request->getFile('image_1');
        $fileImage2 = $this->request->getFile('image_2');
        $fileImage3 = $this->request->getFile('image_3');

        $fileImage->move('image/image1/');
        $fileImage2->move('image/image2/');
        $fileImage3->move('image/image3/');
        // move file
        $image_name = $fileImage->getName();
        $image_name2 = $fileImage2->getName();
        $image_name3 = $fileImage3->getName();

        $this->productModel->save([
            'uuid' => md5(uniqid(time())),
            'user_id' => $this->request->getVar('user_id'),
            'name' => $this->request->getVar('product_name'),
            'price' => $this->request->getVar('product_price'),
            'image1' => $image_name,
            'image2' => $image_name2,
            'image3' => $image_name3,
            'descriptions' => $this->request->getVar('product_descriptions'),
            'category' => $this->request->getVar('choose_category'),
            'stock' => $this->request->getVar('product_stock'),
            'condition_product' => $this->request->getVar('product_condition'),
        ]);
        session()->setFlashdata('pesan', 'new product has created');
        return redirect()->to('/admin');
    }

    public function delete($id)
    {
        $this->productModel->delete($id);
        session()->setFlashdata('pesan', 'product was deleted');
        return redirect()->to('/admin');
    }

    public function edit($uuid)
    {
        if (!session()->has('logged_in')) {
            return redirect()->to('/login');
        }
        $data = [
            'title' => 'Edit Product',
            'validation' => \Config\Services::validation(),
            'product' => $this->productModel->getProduct($uuid)
        ];
        return view('admin/edit-product', $data);
    }

    public function update($id)
    {
        // dd($id);
        $this->productModel->save([
            'id' => $id,
            'user_id' => $this->request->getVar('user_id'),
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
        session()->setFlashdata('pesan', 'product has updated');
        return redirect()->to('/admin');
    }
}
