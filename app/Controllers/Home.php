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
            'title' => 'Course 1',
        ];
        return view('home/course/course1', $data);
    }

    public function register()
    {
        // Proses pendaftaran user
        if ($this->request->getMethod() === 'post') {
            $model = new UserModel();
    
            $data = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role' => $this->request->getPost('role') // Ambil role dari form
            ];
    
            if ($model->save($data) === false) {
                return redirect()->back()->withInput()->with('errors', $model->errors());
            } else {
                // Redirect langsung ke halaman login setelah register berhasil
                return redirect()->to('login')->with('message', 'Register berhasil. Silakan login.');
            }
        }
    
        // Tampilkan form register jika method request adalah GET
        return view('home/register');
    }
    

    public function login()
    {
        // Proses login user
        if ($this->request->getMethod() === 'post') {
            $model = new UserModel();

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $role = $this->request->getPost('role');

            $user = $model->getUserByRole($username, $role); // Cari user berdasarkan username dan role

            if ($user && password_verify($password, $user['password'])) {
                // Login berhasil
                // Lakukan sesuatu seperti menyimpan ke session
                return redirect()->to('admin/dashboard')->with('user', $user);
            } else {
                // Login gagal
                return redirect()->back()->withInput()->with('error', 'Username, role, atau password salah.');
            }
        }

        // Tampilkan form login jika method request adalah GET
        return view('home/login');
    }
    public function logout()
    {
        // Hapus data sesi pengguna
        session()->destroy();

        // Redirect pengguna ke halaman utama atau halaman login
        return redirect()->to('/');
    }
}