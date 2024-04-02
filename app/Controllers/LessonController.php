<?php

namespace App\Controllers;

use App\Models\LessonModel;

class LessonController extends BaseController
{
    protected $lessonModel;

    public function __construct()
    {
        $this->lessonModel = new LessonModel();
    }

    public function index()
    {
        $data['lessons'] = $this->lessonModel->findAll();

        return view('lesson/index', $data);
    }

    // Other controller methods can be added as needed
}