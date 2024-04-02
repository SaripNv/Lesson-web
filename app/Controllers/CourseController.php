<?php

namespace App\Controllers;

use App\Models\CourseModel;

class CourseController extends BaseController
{
    protected $courseModel;

    public function __construct()
    {
        $this->courseModel = new CourseModel();
    }

    public function index()
    {
        $data['courses'] = $this->courseModel->findAll();

        return view('course/index', $data);
    }

    // Other controller methods can be added as needed
}