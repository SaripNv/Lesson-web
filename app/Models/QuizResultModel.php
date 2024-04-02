<?php

namespace App\Models;

use CodeIgniter\Model;

class QuizResultModel extends Model
{
    protected $table = 'quiz_results';
    protected $primaryKey = 'id_quiz_results';
    protected $allowedFields = ['id_user', 'id_quiz', 'selected_option', 'is_correct', 'created_at'];
}