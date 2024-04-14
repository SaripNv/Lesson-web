<?php
// app/Controllers/Home.php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
        ];
        return view('home/index', $data);
    }

    public function course() {
        $data = [
            'title' => 'Course',
        ];
        return view('home/course/index', $data);
    }
    public function course1() {
        $data = [
            'title' => 'Course',
        ];
        return view('home/course/course1/course', $data);
    }

    public function login()
{
    // Proses login user
    if ($this->request->getMethod() === 'post') {
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $role = $this->request->getPost('role');

        // Cari user berdasarkan username dan role
        $user = $model->getUserByRole($username, $role);

        if ($user) {
            // Jika user ditemukan, verifikasi kata sandi
            if (password_verify($password, $user['password'])) {
                // Login berhasil
                // Redirect ke dashboard admin jika role adalah 'admin'
                if ($role === 'admin') {
                    return redirect()->to('admin/dashboard')->with('user', $user);
                } else {
                    // Redirect ke halaman utama jika role bukan 'admin'
                    return redirect()->to('home/index')->with('user', $user);
                }
            } else {
                // Kata sandi salah
                return redirect()->back()->withInput()->with('error', 'Incorrect password.');
            }
        } else {
            // Pengguna tidak ditemukan
            return redirect()->back()->withInput()->with('error', 'User not found.');
        }
    }

    // Tampilkan form login jika method request adalah GET
    return view('home/login/login');
}

    
    public function logout()
    {
        // Hapus data sesi pengguna
        session()->destroy();

        // Redirect pengguna ke halaman utama atau halaman login
        return redirect()->to('/');
    }
}