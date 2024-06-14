<?php
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('admin/dashboard', 'AdminController::index');

// Add routes for AdminController methods
$routes->get('admin/course', 'AdminController::course');
$routes->get('admin/course/add', 'AdminController::add_course');
$routes->post('admin/course/save', 'AdminController::save_course');
$routes->get('admin/course/edit/(:num)', 'AdminController::edit_course/$1');
$routes->post('admin/course/update/(:num)', 'AdminController::update_course/$1');
$routes->get('admin/course/delete/(:num)', 'AdminController::delete_course/$1');

// Routes for lesson
$routes->get('admin/lesson', 'AdminController::lesson');
$routes->get('admin/lesson/add', 'AdminController::add_lesson');
$routes->post('admin/lesson/save', 'AdminController::save_lesson');
$routes->get('admin/lesson/edit/(:num)', 'AdminController::edit_lesson/$1');
$routes->post('admin/lesson/update/(:num)', 'AdminController::update_lesson/$1');
$routes->get('admin/lesson/delete/(:num)', 'AdminController::delete_lesson/$1');

// Routes for user
$routes->get('admin/user', 'AdminController::user');
$routes->get('admin/user/add', 'AdminController::add_user');
$routes->post('admin/user/save', 'AdminController::save_user');
$routes->get('admin/user/edit/(:num)', 'AdminController::edit_user/$1');
$routes->post('admin/user/update/(:num)', 'AdminController::update_user/$1');
$routes->get('admin/user/delete/(:num)', 'AdminController::delete_user/$1');

// Routes for Teacher
$routes->get('admin/teacher', 'AdminController::teacher');
$routes->get('admin/teacher/add', 'AdminController::add_teacher');
$routes->post('admin/teacher/save', 'AdminController::save_teacher');
$routes->get('admin/teacher/edit/(:num)', 'AdminController::edit_teacher/$1');
$routes->post('admin/teacher/update/(:num)', 'AdminController::update_teacher/$1');
$routes->get('admin/teacher/delete/(:num)', 'AdminController::delete_teacher/$1');

// Routes for gallery
$routes->get('admin/gallery', 'AdminController::gallery');
$routes->get('admin/gallery/add', 'AdminController::add_gallery');
$routes->post('admin/gallery/save', 'AdminController::save_gallery');
$routes->get('admin/gallery/edit/(:num)', 'AdminController::edit_gallery/$1');
$routes->post('admin/gallery/update/(:num)', 'AdminController::update_gallery/$1');
$routes->get('admin/gallery/delete/(:num)', 'AdminController::delete_gallery/$1');

// Routes for teacher detail
$routes->get('detail_teacher/(:num)', 'Home::detail_teacher/$1');

// Routes for courses and course lessons
$routes->get('course', 'Home::course');
$routes->get('course/(:num)/lessons', 'Home::course_lessons/$1'); 
$routes->get('lesson/view/(:num)', 'Home::view_lesson/$1');


// Add routes for authentication
$routes->get('register', 'Home::register');
$routes->post('register', 'Home::register');
$routes->get('login', 'Home::login');
$routes->post('login', 'Home::login');
$routes->get('logout', 'Home::logout');