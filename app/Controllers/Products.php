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
            'title' => $productDetail['name'],
            'product' => $productDetail,
        ];
        if (empty($uuid)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Your product not found');
        }
        return view('product/detail', $data);
    }
    public function cart()
    {
        if (!session()->has('logged_in')) {
            return redirect()->to('/login');
        }
        $data = [
            'title' => 'Cart',
            'products' => $this->cartModel->getCart(session('id'))
        ];
        // dd($data);
        return view('product/cart', $data);
    }
    public function addToCart()
    {
        if (!session()->has('logged_in')) {
            return redirect()->to('/login');
        }
        $this->cartModel->save([
            'user_id' => session('id'),
            'product_uuid' => $this->request->getVar('product_uuid'),
            'qty' => $this->request->getVar('quantity'),
        ]);
        session()->setFlashdata('pesan', 'product was added to cart');
        return redirect()->to('/cart');
    }
    public function removeCartProduct($uuid)
    {
        $this->cartModel->where('product_uuid', $uuid)->delete();
        session()->setFlashdata('pesan', 'product was remove from cart');
        return redirect()->to('/cart');
    }
    public function search()
    {
        $name = $this->request->getVar('search');
        $searchResult = $this->productModel->searchProduct($name);
        $data = [
            'title' => 'Search: ' . $name,
            'results' => $searchResult,
            'search' => $name
        ];
        if (empty($name)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Your product not found');
        }
        return view('product/search', $data);
    }
}
