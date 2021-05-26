<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = ['fullname', 'email', 'isAdmin', 'password', 'balance', 'phone'];

    public function getUser($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    public function joinProduct($id)
    {
        if ($id == false) {
            return false;
        }
        return $this->db->table('users')
            ->join('products', 'users.id = products.user_id')
            ->where(['user_id' => $id])
            ->get()->getResultArray();
    }
}
