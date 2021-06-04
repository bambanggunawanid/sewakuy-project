<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table      = 'carts';
    protected $useTimestamps = true;
    protected $allowedFields = ['product_uuid', 'user_id', 'qty'];

    public function getCart($user_id)
    {
        return $this->db->table('carts')
            ->join('products', 'carts.product_uuid = products.uuid', 'LEFT')
            ->where(['carts.user_id' => $user_id])
            ->get()->getResultArray();
    }
}
