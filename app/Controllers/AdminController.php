<?php

namespace App\Controllers;

use App\Models\CourseModel;
use App\Models\LessonModel;
use App\Models\TeacherModel;
use App\Models\UserModel; 
use CodeIgniter\Controller;

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

// user
public function user()
{
    $users = $this->userModel->findAll();
    $data = [
        'title' => 'User Management',
        'users' => $users,
    ];
    return view('admin/user/user', $data);
}

public function add_user()
{
    $data = [
        'title' => 'Add New User',
    ];
    return view('admin/user/add_user', $data);
}

public function save_user()
{
    // Validasi input
    $validation = \Config\Services::validation();
    $validation->setRules([
        'username' => 'required|min_length[5]|max_length[255]',
        'email' => 'required|valid_email|is_unique[user.email]',
        'password' => 'required|min_length[8]',
        'role' => 'required|in_list[admin,teacher,user]'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        // Jika validasi gagal, kembali ke halaman tambah pengguna dengan pesan error
        return redirect()->back()->withInput()->with('error', $validation->getErrors());
    }

    // Ambil data dari form
    $userData = [
        'username' => $this->request->getPost('username'),
        'email' => $this->request->getPost('email'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'role' => $this->request->getPost('role')
    ];

    // Simpan data pengguna baru ke dalam database
    if ($this->userModel->save($userData)) {
        // Jika berhasil, kembalikan ke halaman admin dengan pesan sukses
        return redirect()->to('/admin/user')->with('success', 'User added successfully.');
    } else {
        // Jika gagal, kembalikan ke halaman admin dengan pesan error
        return redirect()->to('/admin/user')->with('error', 'Failed to add user. Please try again.');
    }
}


public function edit_user($id)
{
    // Temukan pengguna berdasarkan ID
    $user = $this->userModel->find($id);
    if (!$user) {
        return redirect()->to('/admin/user')->with('error', 'User not found.');
    }

    $data = [
        'title' => 'Edit User',
        'user' => $user,
    ];

    return view('admin/user/edit_user', $data);
}

public function update_user($id)
{
    // Validasi input
    $validation = \Config\Services::validation();
    $validation->setRules([
        'username' => 'required|min_length[5]|max_length[255]',
        'email' => 'required|valid_email',
        'role' => 'required|in_list[admin,teacher,user]'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        // Jika validasi gagal, kembali ke halaman edit pengguna dengan pesan error
        return redirect()->back()->withInput()->with('error', $validation->getErrors());
    }

    // Ambil data dari form
    $userData = [
        'username' => $this->request->getPost('username'),
        'email' => $this->request->getPost('email'),
        'role' => $this->request->getPost('role')
    ];

    // Perbarui data pengguna berdasarkan ID
    if ($this->userModel->update($id, $userData)) {
        // Jika berhasil, kembalikan ke halaman admin dengan pesan sukses
        return redirect()->to('/admin/user')->with('success', 'User updated successfully.');
    } else {
        // Jika gagal, kembalikan ke halaman admin dengan pesan error
        return redirect()->to('/admin/user')->with('error', 'Failed to update user. Please try again.');
    }
}


public function delete_user($id)
{
    $user = $this->userModel->find($id);
    if (!$user) {
        return redirect()->to('/admin/user')->with('error', 'User not found.');
    }

    if ($this->userModel->delete($id)) {
        return redirect()->to('/admin/user')->with('success', 'User deleted successfully.');
    } else {
        return redirect()->to('/admin/user')->with('error', 'Failed to delete user. Please try again.');
    }
}


// course
    public function course()
{
    // Ambil semua data kursus
    $courses = $this->courseModel->findAll();

    // Ambil nama guru untuk setiap kursus
    foreach ($courses as $key => $course) {
        $teacher = $this->teacherModel->find($course['id_teacher']);
        if ($teacher) {
            $courses[$key]['teacher_name'] = $teacher['nama'];
        } else {
            $courses[$key]['teacher_name'] = 'Unknown';
        }
    }

    // Kirim data kursus beserta nama guru ke view
    $data = [
        'title' => 'Course',
        'courses' => $courses,
    ];
    return view('admin/course/course', $data);
}

public function add_course()
{
    $courseModel = new CourseModel();
    $data = [
        'title' => 'Add Course',
        'teachers' => $courseModel->getTeachersForDropdown(), // Mengambil daftar guru untuk dropdown
    ];
    return view('admin/course/add_course', $data);
}

public function save_course()
{
    $validationRules = [
        'judul_course' => 'required',
        'id_teacher' => 'required', // Menambahkan aturan validasi untuk id_teacher
    ];

    if (!$this->validate($validationRules)) {
        return redirect()->to('/admin/course/add')->withInput()->with('validation', $this->validator);
    }

    $courseData = [
        'judul_course' => $this->request->getPost('judul_course'),
        'id_teacher' => $this->request->getPost('id_teacher'), // Mengambil id_teacher dari form
    ];

    $courseModel = new CourseModel();
    if ($courseModel->insert($courseData)) {
        return redirect()->to('/admin/course')->with('success', 'Course added successfully.');
    } else {
        return redirect()->to('/admin/course/add')->withInput()->with('error', 'Failed to save course data. Please try again.');
    }
}

public function edit_course($id)
{
    $courseModel = new CourseModel();
    $course = $courseModel->find($id);

    if (!$course) {
        return redirect()->to('/admin/course')->with('error', 'Course not found.');
    }

    $data = [
        'title' => 'Edit Course',
        'course' => $course,
        'teachers' => $courseModel->getTeachersForDropdown(), // Mengambil daftar guru untuk dropdown
    ];

    return view('admin/course/edit_course', $data);
}

public function update_course($id)
{
    $validationRules = [
        'judul_course' => 'required',
        'id_teacher' => 'required', // Menambahkan aturan validasi untuk id_teacher
    ];

    if (!$this->validate($validationRules)) {
        return redirect()->to('/admin/course/edit/' . $id)->withInput()->with('validation', $this->validator);
    }

    $courseData = [
        'judul_course' => $this->request->getPost('judul_course'),
        'id_teacher' => $this->request->getPost('id_teacher'), // Mengambil id_teacher dari form
    ];

    $courseModel = new CourseModel();
    if ($courseModel->update($id, $courseData)) {
        return redirect()->to('/admin/course')->with('success', 'Course updated successfully.');
    } else {
        return redirect()->to('/admin/course/edit/' . $id)->withInput()->with('error', 'Failed to update course data. Please try again.');
    }
}

public function delete_course($id)
{
    $courseModel = new CourseModel();
    $course = $courseModel->find($id);

    if (!$course) {
        return redirect()->to('/admin/course')->with('error', 'Course not found.');
    }

    if ($courseModel->delete($id)) {
        return redirect()->to('/admin/course')->with('success', 'Course deleted successfully.');
    } else {
        return redirect()->to('/admin/course')->with('error', 'Failed to delete course. Please try again.');
    }
}

// lesson
public function lesson()
{
    $lessons = $this->lessonModel->findAll();
    $data = [
        'title' => 'Lesson',
        'lessons' => $lessons,
    ];
    return view('admin/lesson/lesson', $data);
}

public function add_lesson()
{
    $courses = $this->courseModel->findAll();
    $data = [
        'title' => 'Add Lesson',
        'courses' => $courses,
    ];
    return view('admin/lesson/add_lesson', $data);
}

public function save_lesson()
{
    $validationRules = [
        'judul' => 'required',
        'id_course' => 'required',
        'file_video' => 'uploaded[file_video]|max_size[file_video,10240]|is_video[file_video]'
    ];

    if (!$this->validate($validationRules)) {
        return redirect()->to('/admin/lesson/add')->withInput()->with('validation', $this->validator);
    }

    $file_video = $this->request->getFile('file_video');

    if ($file_video->isValid() && !$file_video->hasMoved()) {
        $newName = $file_video->getRandomName();
        $file_video->move(ROOTPATH . 'public/assets/videos', $newName);

        $lessonData = [
            'id_course' => $this->request->getPost('id_course'),
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'urutan' => $this->request->getPost('urutan'),
            'file_video' => $newName
        ];

        if ($this->lessonModel->insert($lessonData)) {
            return redirect()->to('/admin/lesson')->with('success', 'Lesson added successfully.');
        } else {
            return redirect()->to('/admin/lesson/add')->withInput()->with('error', 'Failed to save lesson data. Please try again.');
        }
    } else {
        return redirect()->to('/admin/lesson/add')->withInput()->with('error', 'Failed to upload lesson video. Please try again.');
    }
}

public function edit_lesson($id)
{
    $lesson = $this->lessonModel->find($id);
    $courses = $this->courseModel->findAll();

    if (!$lesson) {
        return redirect()->to('/admin/lesson')->with('error', 'Lesson not found.');
    }

    $data = [
        'title' => 'Edit Lesson',
        'lesson' => $lesson,
        'courses' => $courses,
    ];

    return view('admin/lesson/edit_lesson', $data);
}

public function update_lesson($id)
{
    $validationRules = [
        'judul' => 'required',
        'id_course' => 'required',
    ];

    if (!$this->validate($validationRules)) {
        return redirect()->to('/admin/lesson/edit/' . $id)->withInput()->with('validation', $this->validator);
    }

    $lesson = $this->lessonModel->find($id);

    if (!$lesson) {
        return redirect()->to('/admin/lesson')->with('error', 'Lesson not found.');
    }

    $file_video = $this->request->getFile('file_video');
    $file_video_name = $lesson['file_video'];

    if ($file_video->isValid() && !$file_video->hasMoved()) {
        $newName = $file_video->getRandomName();
        $file_video->move(ROOTPATH . 'public/assets/videos', $newName);
        $file_video_name = $newName;
    }

    $lessonData = [
        'id_course' => $this->request->getPost('id_course'),
        'judul' => $this->request->getPost('judul'),
        'deskripsi' => $this->request->getPost('deskripsi'),
        'urutan' => $this->request->getPost('urutan'),
        'file_video' => $file_video_name
    ];

    if ($this->lessonModel->update($id, $lessonData)) {
        return redirect()->to('/admin/lesson')->with('success', 'Lesson updated successfully.');
    } else {
        return redirect()->to('/admin/lesson/edit/' . $id)->withInput()->with('error', 'Failed to update lesson data. Please try again.');
    }
}

public function delete_lesson($id)
{
    $lesson = $this->lessonModel->find($id);

    if (!$lesson) {
        return redirect()->to('/admin/lesson')->with('error', 'Lesson not found.');
    }

    if ($this->lessonModel->delete($id)) {
        return redirect()->to('/admin/lesson')->with('success', 'Lesson deleted successfully.');
    } else {
        return redirect()->to('/admin/lesson')->with('error', 'Failed to delete lesson. Please try again.');
    }
}



    // teacher
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