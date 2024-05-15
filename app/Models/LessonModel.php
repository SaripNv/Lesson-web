<?php

namespace App\Models;

use CodeIgniter\Model;

class LessonModel extends Model
{
    protected $table = 'lesson';
    protected $primaryKey = 'id_lesson';
    protected $allowedFields = ['title', 'content', 'id_course', 'order', 'video_url', 'created_at', 'updated_at'];

    public function getLesson($id_lesson)
    {
        return $this->join('course', 'course.id_course = lesson.id_course')
                    ->where('lesson.id_lesson', $id_lesson)
                    ->select('lesson.*, course.judul_course as course_title')
                    ->first();
    }

    public function getLessonsByCourse($id_course)
    {
        return $this->join('course', 'course.id_course = lesson.id_course')
                    ->where('lesson.id_course', $id_course)
                    ->select('lesson.*, course.judul_course as course_title')
                    ->findAll();
    }

    public function getCoursesForDropdown()
    {
        $courseModel = new CourseModel();
        $courses = $courseModel->findAll();
        $options = [];
        foreach ($courses as $course) {
            $options[$course['id_course']] = $course['judul_course'];
        }
        return $options;
    }
}