<?php
// CourseModel.php
namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table = 'course';
    protected $primaryKey = 'id_course';
    protected $allowedFields = ['judul', 'deskripsi', 'created_at', 'updated_at'];
}