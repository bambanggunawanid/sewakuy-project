<?php

namespace App\Controllers;
use App\Models\ProductsModel;

class Products extends BaseController
{
    protected $productModel;
    public function __construct()
    {
        $this->productModel = new ProductsModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Sewakuy App',
            'products' => $this->productModel->getProduct()
        ];

        return view('product/index', $data);
    }
    public function detail($id)
    {
        $productDetail = $this->productModel->getProduct($id);
        $data = [
            'title' => $productDetail['name'],
            'product' =>$productDetail,
        ];
        return view('product/detail', $data);
    }
}
