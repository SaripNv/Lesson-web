<?php

namespace App\Controllers;

use App\Models\CourseModel;
use App\Models\LessonModel;
use App\Models\TeacherModel;
use App\Models\UserModel; 

class AdminController extends BaseController
{
    protected $courseModel;
    protected $lessonModel;
    protected $teacherModel;
    protected $userModel;
    

    public function __construct()
    {
        $this->courseModel = new CourseModel();
        $this->lessonModel = new LessonModel();
        $this->teacherModel = new TeacherModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
        ];
        return view('dashboard/index', $data);
    }

    public function user()
    {
        $users = $this->userModel->findAll();
        $data = [
            'title' => 'User',
            'users' => $users,
        ];
        return view('admin/user/user', $data);
    }

    public function course()
    {
        $courses = $this->courseModel->findAll();
        $data = [
            'title' => 'Course',
            'courses' => $courses,
        ];
        return view('admin/course/course', $data);
    }
      // Menampilkan halaman tambah kursus
      public function add_course()
      {
          $data = [
              'title' => 'Add Course',
          ];
          return view('admin/course/add_course', $data);
      }
  
      // Menyimpan data kursus baru ke database
      public function save_course()
      {
          $courseData = [
              'judul_course' => $this->request->getPost('judul_course'),
              // Tambahkan field lain sesuai kebutuhan
          ];
      
          if ($this->courseModel->insert($courseData)) {
              // Data berhasil disimpan
              echo 'Data kursus berhasil disimpan';
          } else {
              // Data gagal disimpan
              echo 'Gagal menyimpan data kursus';
          }
      
          return redirect()->to('/admin/course');
      }
      
  
      // Menampilkan halaman edit kursus
      public function edit_course($id)
      {
          $course = $this->courseModel->find($id);
  
          $data = [
              'title' => 'Edit Course',
              'course' => $course,
          ];
  
          return view('admin/course/edit_course', $data);
      }
  
      // Menyimpan perubahan data kursus ke database
      public function update_course($id)
      {
          $courseData = [
              'judul_course' => $this->request->getPost('judul_course'),
              // Tambahkan field lain sesuai kebutuhan
          ];
  
          $this->courseModel->update($id, $courseData);
  
          return redirect()->to('/admin/course');
      }
  
      // Menghapus kursus dari database
      public function delete_course($id)
      {
          $this->courseModel->delete($id);
  
          return redirect()->to('/admin/course');
      }

    public function lesson()
    {
        $lessons = $this->lessonModel->findAll();
        $data = [
            'title' => 'Lesson',
            'lessons' => $lessons,
        ];
        return view('admin/lesson/lesson', $data);
    }

    public function teacher()
    {
        $teachers = $this->teacherModel->findAll();
        $data = [
            'title' => 'Teacher',
            'teachers' => $teachers,
        ];
        return view('admin/teacher/teacher', $data);
    }
    // Method untuk menampilkan halaman tambah guru
    public function add_teacher()
    {
        return view('admin/teacher/add_teacher');
    }

    // Method untuk menyimpan data guru baru ke database
    public function save_teacher()
    {
        $validationRules = [
            'nama' => 'required',
            'email' => 'required|valid_email',
            'bidang_keahlian' => 'required',
            'deskripsi' => 'required',
            'foto_guru' => 'uploaded[foto_guru]|max_size[foto_guru,1024]|is_image[foto_guru]'
        ];
    
        if (!$this->validate($validationRules)) {
            return redirect()->to('/admin/teacher/add')->withInput()->with('validation', $this->validator);
        }
    
        $foto_guru = $this->request->getFile('foto_guru');
    
        if ($foto_guru->isValid() && !$foto_guru->hasMoved()) {
            $newName = $foto_guru->getRandomName();
            $foto_guru->move(ROOTPATH . 'public/assets/img', $newName);
    
            $teacherData = [
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'bidang_keahlian' => $this->request->getPost('bidang_keahlian'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'foto_guru' => $newName
            ];
    
            if ($this->teacherModel->insert($teacherData)) {
                return redirect()->to('/admin/teacher')->with('success', 'Teacher added successfully.');
            } else {
                return redirect()->to('/admin/teacher/add')->withInput()->with('error', 'Failed to save teacher data. Please try again.');
            }
        } else {
            return redirect()->to('/admin/teacher/add')->withInput()->with('error', 'Failed to upload teacher image. Please try again.');
        }
    }
    
    
    


    // Method untuk menampilkan halaman edit guru
    public function edit_teacher($id)
    {
        $teacher = $this->teacherModel->find($id);
        $data = [
            'teacher' => $teacher
        ];
        return view('admin/teacher/edit_teacher', $data);
    }

    // Method untuk menyimpan perubahan data guru ke database
    public function update_teacher($id)
{
    $validationRules = [
        'nama' => 'required',
        'email' => 'required|valid_email',
        'bidang_keahlian' => 'required',
        'deskripsi' => 'required'
    ];

    if (!$this->validate($validationRules)) {
        return redirect()->to('/admin/teacher/edit/' . $id)->withInput()->with('validation', $this->validator);
    }

    $teacher = $this->teacherModel->find($id);
    if (!$teacher) {
        return redirect()->to('/admin/teacher')->with('error', 'Teacher not found.');
    }

    $foto_guru = $this->request->getFile('foto_guru');

    if ($foto_guru->isValid() && !$foto_guru->hasMoved()) {
        $newName = $foto_guru->getRandomName();
        $foto_guru->move(ROOTPATH . 'public/assets/img', $newName);
        $foto_guru_name = $newName;
    } else {
        $foto_guru_name = $teacher['foto_guru'];
    }

    $teacherData = [
        'nama' => $this->request->getPost('nama'),
        'email' => $this->request->getPost('email'),
        'bidang_keahlian' => $this->request->getPost('bidang_keahlian'),
        'deskripsi' => $this->request->getPost('deskripsi'),
        'foto_guru' => $foto_guru_name
    ];

    if ($this->teacherModel->update($id, $teacherData)) {
        return redirect()->to('/admin/teacher')->with('success', 'Teacher updated successfully.');
    } else {
        return redirect()->to('/admin/teacher/edit/' . $id)->withInput()->with('error', 'Failed to update teacher data. Please try again.');
    }
}
public function delete_teacher($id)
{
    // Cari data guru berdasarkan ID
    $teacher = $this->teacherModel->find($id);

    // Jika data guru tidak ditemukan, kembalikan ke halaman admin dengan pesan error
    if (!$teacher) {
        return redirect()->to('/admin/teacher')->with('error', 'Teacher not found.');
    }

    // Hapus foto guru jika ada
    if (!empty($teacher['foto_guru'])) {
        unlink(ROOTPATH . 'public/assets/img/' . $teacher['foto_guru']);
    }

    // Hapus data guru dari database
    if ($this->teacherModel->delete($id)) {
        // Jika berhasil, kembalikan ke halaman admin dengan pesan sukses
        return redirect()->to('/admin/teacher')->with('success', 'Teacher deleted successfully.');
    } else {
        // Jika gagal, kembalikan ke halaman admin dengan pesan error
        return redirect()->to('/admin/teacher')->with('error', 'Failed to delete teacher. Please try again.');
    }
}

}