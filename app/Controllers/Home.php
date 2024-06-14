<?php

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
        $gallery = $this->galleryModel->findAll();
        $data = [
            'title' => 'Home',
            'users' => $users,
            'teachers' => $teachers,
            'gallery' => $gallery,
        ];

        return view('home/index', $data);
    }

    public function course()
    {
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

    public function course_lessons($course_id)
    {
        $lessons = $this->lessonModel->where('id_course', $course_id)->findAll();
        $course = $this->courseModel->find($course_id);
        
        if (!$course) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Course not found");
        }
        $data = [
            'title' => 'Lessons for ' . $course['judul_course'],
            'lessons' => $lessons,
            'course_name' => $course['judul_course'],
        ];

        return view('home/lesson/course_lessons', $data);
    }

    public function view_lesson($id_lesson)
{
    $lesson = $this->lessonModel->find($id_lesson);
    
    if (!$lesson) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Lesson not found");
    }

    $data = [
        'title' => $lesson['title'],
        'lesson' => $lesson,
    ];

    return view('home/lesson/view_lesson', $data);
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
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'username' => 'required|alpha_numeric|min_length[3]|is_unique[user.username]',
                'email' => 'required|valid_email|is_unique[user.email]',
                'password' => 'required|min_length[6]',
                'role' => 'required|in_list[admin,teacher,user]'
            ];

            $errors = [
                'username' => [
                    'is_unique' => 'Username sudah digunakan.'
                ],
                'email' => [
                    'is_unique' => 'Email sudah digunakan.'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $userData = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role' => $this->request->getPost('role'),
            ];

            $this->userModel->insert($userData);

            session()->setFlashdata('message', 'Registrasi berhasil.');

            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Register',
        ];

        return view('home/register/register', $data);
    }

    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $role = $this->request->getPost('role');

            $user = $this->userModel->getUserByRole($username, $role);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $userData = [
                        'id_user' => $user['id_user'],
                        'username' => $user['username'],
                        'role' => $user['role'],
                        'logged_in' => true,
                    ];
                    session()->set($userData);

                    if ($role === 'admin') {
                        return redirect()->to('/admin/dashboard');
                    } elseif ($role === 'teacher') {
                        return redirect()->to('/admin/teacher');
                    } elseif ($role === 'user') {
                        return redirect()->to('/');
                    }
                } else {
                    session()->setFlashdata('error', 'Password yang Anda masukkan salah.');
                }
            } else {
                session()->setFlashdata('error', 'Username atau peran pengguna tidak valid.');
            }
        }

        return view('home/login/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}