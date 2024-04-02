<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('admin/dashboard', 'AdminController::index');

$routes->get('admin/manage/users', 'AdminController::manageUsers');

$routes->get('admin/manage/courses', 'AdminController::manageCourses');
$routes->get('admin/add_course', 'AdminController::addCourseForm');
$routes->post('admin/save_course', 'AdminController::saveCourse');
$routes->get('admin/edit_course/(:num)', 'AdminController::editCourseForm/$1');
$routes->post('admin/update_course/(:num)', 'AdminController::updateCourse/$1');

$routes->get('admin/manage/lessons', 'AdminController::manageLessons');
$routes->get('admin/manage/quizzes', 'AdminController::manageQuizzes');
$routes->get('admin/manage/quiz_results', 'AdminController::manageQuizResults');

$routes->get('quiz_results', 'QuizResultController::index');

$routes->get('register', 'Home::register');
$routes->post('register', 'Home::register');

$routes->get('login', 'Home::login');
$routes->post('login', 'Home::login');

$routes->get('logout', 'Home::logout');

// Tambahkan rute untuk halaman kursus
$routes->get('course', 'Home::course');
$routes->get('course1', 'Home::course1');