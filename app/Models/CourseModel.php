<?php namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table = 'course';
    protected $primaryKey = 'id_course';
    protected $allowedFields = ['judul_course', 'id_teacher', 'created_at', 'updated_at'];

    public function getCourse($id_course)
    {
        return $this->where('id_course', $id_course)->first();
    }

    // Jika diperlukan, tambahkan metode lain untuk mengambil data kursus

    // Metode untuk mendapatkan daftar guru untuk dropdown
    public function getTeachersForDropdown()
    {
        $teacherModel = new TeacherModel();
        $teachers = $teacherModel->findAll();
        $options = [];
        foreach ($teachers as $teacher) {
            $options[$teacher['id_teacher']] = $teacher['nama'];
        }
        return $options;
    }
}