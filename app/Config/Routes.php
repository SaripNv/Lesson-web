<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('admin/dashboard', 'AdminController::index');
// Add routes for AdminController methods
$routes->get('admin/user', 'AdminController::user');
$routes->get('admin/course', 'AdminController::course');
$routes->get('admin/course/add', 'AdminController::add_course');
$routes->post('admin/course/save', 'AdminController::save_course');
$routes->get('admin/course/edit/(:num)', 'AdminController::edit_course/$1');
$routes->post('admin/course/update/(:num)', 'AdminController::update_course/$1');
$routes->get('admin/course/delete/(:num)', 'AdminController::delete_course/$1');

$routes->get('admin/lesson', 'AdminController::lesson');


// Routes for Teacher Management
$routes->get('admin/teacher', 'AdminController::teacher');
$routes->get('admin/teacher/add', 'AdminController::add_teacher');
$routes->post('admin/teacher/save', 'AdminController::save_teacher');
$routes->get('admin/teacher/edit/(:num)', 'AdminController::edit_teacher/$1');
$routes->post('admin/teacher/update/(:num)', 'AdminController::update_teacher/$1');


// Add routes for authentication
$routes->get('register', 'Home::register');
$routes->post('register', 'Home::register');
$routes->get('login', 'Home::login');
$routes->post('login', 'Home::login');
$routes->get('logout', 'Home::logout');