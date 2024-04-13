<?php

namespace App\Models;

use CodeIgniter\Model;

class LessonModel extends Model
{
    protected $table = 'lesson';
    protected $primaryKey = 'id_lesson';
    protected $allowedFields = ['id_course', 'judul', 'file_video', 'created_at', 'updated_at'];
}