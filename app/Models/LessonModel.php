<?php

namespace App\Models;

use CodeIgniter\Model;

class LessonModel extends Model
{
    protected $table = 'lesson';
    protected $primaryKey = 'id_lesson';
    protected $allowedFields = ['id_course', 'judul', 'deskripsi', 'urutan', 'file_video', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    public function getLessonsByCourse($id_course)
    {
        return $this->where('id_course', $id_course)->findAll();
    }
}