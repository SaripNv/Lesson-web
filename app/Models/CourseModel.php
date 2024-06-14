<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table = 'course';
    protected $primaryKey = 'id_course';
    protected $allowedFields = ['judul_course', 'id_teacher'];

    public function getCourse($id_course)
    {
        return $this->join('teacher', 'teacher.id_teacher = course.id_teacher')
                    ->where('course.id_course', $id_course)
                    ->select('course.*, teacher.nama as teacher_name')
                    ->first();
    }
    

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