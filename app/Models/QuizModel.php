<?php

namespace App\Models;

use CodeIgniter\Model;

class QuizModel extends Model
{
    protected $table = 'quiz';
    protected $primaryKey = 'id_quiz';
    protected $allowedFields = ['id_lesson', 'question', 'options', 'correct_option', 'created_at', 'updated_at'];
    protected $casts = [
        'options' => 'array'
    ];
}