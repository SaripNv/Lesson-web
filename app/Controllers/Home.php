<?php
// app/Controllers/Home.php

namespace App\Controllers;

use App\Models\CourseModel;
use App\Models\LessonModel;
use App\Models\TeacherModel;
use App\Models\UserModel; 
use App\Models\GalleryModel;
use CodeIgniter\Controller;

class Home extends Controller
{
    
    protected $courseModel;
    protected $lessonModel;
    protected $teacherModel;
    protected $userModel;
    protected $galleryModel;
    

    public function __construct()
    {
        $this->courseModel = new CourseModel();
        $this->lessonModel = new LessonModel();
        $this->teacherModel = new TeacherModel();
        $this->userModel = new UserModel();
        $this->galleryModel = new GalleryModel();
    }
    public function index()
    {
        $users = $this->userModel->findAll();
        $teachers = $this->teacherModel->findAll();
        $gallery = $this->galleryModel->findAll(); // Tambahkan baris ini untuk mengambil data galeri
        $data = [
            'title' => 'Home',
            'users' => $users,
            'teachers' => $teachers,
            'gallery' => $gallery, // Kirim data galeri ke tampilan
        ];
    
        return view('home/index', $data);
    }

    public function course()
    {
        // Ambil daftar kursus dan data guru untuk dropdown
        $courses = $this->courseModel->select('course.*, teacher.nama as teacher_name')
                                     ->join('teacher', 'teacher.id_teacher = course.id_teacher')
                                     ->findAll();
        $teachersDropdown = $this->courseModel->getTeachersForDropdown();
    
        $data = [
            'title' => 'Course',
            'courses' => $courses,
            'teachersDropdown' => $teachersDropdown,
        ];
    
        return view('home/course/course', $data);
    }
    
    
    public function lesson()
    {
        $lessons = $this->lessonModel->findAll();
        $coursesDropdown = $this->lessonModel->getCoursesForDropdown();
    
        $data = [
            'title' => 'Lessons',
            'lessons' => $lessons,
            'coursesDropdown' => $coursesDropdown,
        ];
    
        return view('home/lesson/lesson', $data);
    }
    
    public function detail_lesson()
    {
        $lessons = $this->lessonModel->findAll();
    
        $data = [
            'title' => 'Lesson Detail',
            'lesson' => $lessons,
        ];
    
        return view('home/lesson/detail_lesson', $data);
    }


    public function detail_teacher($id)
{
    if (!is_numeric($id) || $id <= 0) {
        return redirect()->to('/error');
    }
    
    $teacher = $this->teacherModel->find($id);

    if (!$teacher) {
        return redirect()->to('/error');
    }

    $data = [
        'title' => 'Teacher Detail',
        'teacher' => $teacher,
    ];

    return view('home/teacher/detail_teacher', $data);
}

    
public function register()
{
    // Cek apakah form registrasi telah disubmit
    if ($this->request->getMethod() === 'post') {
        // Validasi input
        $rules = [
            'username' => 'required|alpha_numeric|min_length[3]|is_unique[user.username]',
            'email' => 'required|valid_email|is_unique[user.email]',
            'password' => 'required|min_length[6]',
            'role' => 'required|in_list[admin,teacher,user]' // Ubah role dari guru menjadi teacher
        ];

        // Set pesan error untuk validasi
        $errors = [
            'username' => [
                'is_unique' => 'Username sudah digunakan.'
            ],
            'email' => [
                'is_unique' => 'Email sudah digunakan.'
            ]
        ];

        if (!$this->validate($rules, $errors)) {
            // Jika validasi gagal, kembalikan ke halaman registrasi dengan pesan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Jika validasi berhasil, tambahkan pengguna ke database
        $userData = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role'), // Ambil role dari form
        ];

        // Simpan data pengguna
        $this->userModel->insert($userData);

        // Tampilkan pesan sukses
        session()->setFlashdata('message', 'Registrasi berhasil.');

        // Redirect ke halaman login
        return redirect()->to('/login');
    }

    // Tampilkan form registrasi jika method request adalah GET
    $data = [
        'title' => 'Register',
    ];

    return view('home/register/register', $data);
}



public function login()
{
    // Cek apakah form login telah disubmit
    if ($this->request->getMethod() === 'post') {
        // Ambil data dari form
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $role = $this->request->getPost('role');

        // Cari pengguna berdasarkan username dan role
        $user = $this->userModel->getUserByRole($username, $role);

        // Jika pengguna ditemukan
        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Buat sesi pengguna
                $userData = [
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'logged_in' => true,
                ];
                session()->set($userData);

                // Redirect sesuai peran pengguna
                if ($role === 'admin') {
                    return redirect()->to('/admin/dashboard');
                } elseif ($role === 'teacher') { // Ubah role guru menjadi teacher
                    return redirect()->to('/admin/teacher');
                } elseif ($role === 'user') {
                    return redirect()->to('/');
                }
            } else {
                // Jika password tidak sesuai, tampilkan pesan error
                session()->setFlashdata('error', 'Password yang Anda masukkan salah.');
            }
        } else {
            // Jika pengguna tidak ditemukan, tampilkan pesan error
            session()->setFlashdata('error', 'Username atau peran pengguna tidak valid.');
        }
    }

    // Tampilkan form login jika method request adalah GET
    return view('home/login/login');
}



    
    public function logout()
    {
        // Hapus data sesi pengguna
        session()->destroy();
        
        return redirect()->to('/');
    }
}