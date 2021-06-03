<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table      = 'products';
    protected $useTimestamps = true;
    protected $allowedFields = [ 'uuid','user_id','name', 'price', 'descriptions', 'category', 'stock', 'condition_product', 'image1','image2','image3'];

    public function getProduct($uuid = false)
    {
        if ($uuid == false) {
            return $this->findAll();
        }
        return $this->where(['uuid' => $uuid])->first();
    }
}
