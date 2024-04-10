<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CourseModel;
use App\Models\LessonModel;
use App\Models\QuizModel;
use App\Models\QuizResultModel;

class AdminController extends BaseController
{
    protected $userModel;
    protected $courseModel;
    protected $lessonModel;
    protected $quizModel;
    protected $quizResultModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->courseModel = new CourseModel();
        $this->lessonModel = new LessonModel();
        $this->quizModel = new QuizModel();
        $this->quizResultModel = new QuizResultModel();
    }

    public function index()
    {
        return view('dashboard/index');
    }

    public function manageUsers()
    {
        $data['users'] = $this->userModel->findAll();
        return view('admin/user/manage_users', $data);
    }

    public function manageCourses()
    {
        $data['courses'] = $this->courseModel->findAll();
        return view('admin/course/manage_courses', $data);
    }

    public function manageLessons()
    {
        $data['lessons'] = $this->lessonModel->findAll();
        return view('admin/lesson/manage_lessons', $data);
    }

    public function manageQuizzes()
    {
        $data['quizzes'] = $this->quizModel->findAll();
        return view('admin/quiz/manage_quizzes', $data);
    }

    public function manageQuizResults()
    {
        $data['quizResults'] = $this->quizResultModel->findAll();
        return view('admin/result/manage_quiz_results', $data);
    }
    
}