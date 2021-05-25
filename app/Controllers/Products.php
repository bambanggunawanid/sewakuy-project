<?php

namespace App\Controllers;

class Products extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Sewakuy App',
            'products' => $this->productModel->getProduct()
        ];

        return view('product/index', $data);
    }
    public function detail($uuid)
    {
        $productDetail = $this->productModel->getProduct($uuid);
        $data = [
            'title' => "tes",
            'product' => $productDetail,
        ];
        if(empty($uuid)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Your product not found');
        }
        return view('product/detail', $data);
    }

}
