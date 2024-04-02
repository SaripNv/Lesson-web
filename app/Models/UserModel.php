<?php
// app/Models/UserModel.php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'email', 'password', 'role'];

    // Menambahkan method untuk mencari user berdasarkan username dan role
    public function getUserByRole($username, $role)
    {
        return $this->where('username', $username)
                    ->where('role', $role)
                    ->first();
    }
}