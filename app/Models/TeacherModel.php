<?php

namespace App\Models;

use CodeIgniter\Model;

class TeacherModel extends Model
{
    protected $table = 'teacher';
    protected $primaryKey = 'id_teacher';
    protected $allowedFields = ['nama', 'email', 'bidang_keahlian', 'deskripsi', 'foto_guru', 'created_at', 'updated_at'];
}