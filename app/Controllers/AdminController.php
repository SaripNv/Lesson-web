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
        return view('admin/manage_users', $data);
    }

    public function manageCourses()
    {
        $data['courses'] = $this->courseModel->findAll();
        return view('admin/manage_courses', $data);
    }

    public function manageLessons()
    {
        $data['lessons'] = $this->lessonModel->findAll();
        return view('admin/manage_lessons', $data);
    }

    public function manageQuizzes()
    {
        $data['quizzes'] = $this->quizModel->findAll();
        return view('admin/manage_quizzes', $data);
    }

    public function manageQuizResults()
    {
        $data['quizResults'] = $this->quizResultModel->findAll();
        return view('admin/manage_quiz_results', $data);
    }
    
    // Tambahkan method baru untuk menampilkan form tambah kursus
    public function addCourseForm()
    {
        return view('admin/add_course');
    }
    
    // Tambahkan method untuk menyimpan data kursus baru
    public function saveCourse()
    {
        // Ambil data dari form
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        
        // Simpan data ke dalam database
        $this->courseModel->insert([
            'title' => $title,
            'description' => $description
        ]);
        
        // Redirect ke halaman manajemen kursus setelah menyimpan
        return redirect()->to('admin/manage/courses');
    }
    
    // Tambahkan method untuk menampilkan form edit kursus
    public function editCourseForm($id)
    {
        $data['course'] = $this->courseModel->find($id);
        return view('admin/edit_course', $data);
    }
    
    // Tambahkan method untuk mengupdate data kursus
    public function updateCourse($id)
    {
        // Ambil data dari form
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        
        // Update data ke dalam database
        $this->courseModel->update($id, [
            'title' => $title,
            'description' => $description
        ]);
        
        // Redirect ke halaman manajemen kursus setelah mengupdate
        return redirect()->to('admin/manage/courses');
    }
}