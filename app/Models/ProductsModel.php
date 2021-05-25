<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table      = 'products';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'uuid', 'image_id', 'price', 'descriptions', 'category_id', 'stock', 'condition_product', 'image1','image2','image3'];

    public function getProduct($uuid = false)
    {
        if ($uuid == false) {
            return $this->findAll();
        }
        return $this->where(['uuid' => $uuid])->first();
    }
}
