<?php

namespace App\Models;

use CodeIgniter\Model;

class LessonModel extends Model
{
    protected $table = 'lesson';
    protected $primaryKey = 'id_lesson';
    protected $allowedFields = ['id_course', 'judul', 'konten', 'video_url', 'sequence_number'];
}