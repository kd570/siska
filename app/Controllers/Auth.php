<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->us = new UserModel;
    }
    public function index()
    {
        return redirect()->to(site_url('login'));
    }
    public function login()
    {
        if (session('id_user')) {
            return redirect()->to(site_url('home'));
        }
        return view('auth/login');
    }

    public function loginProcess()
    {
        //mengambil data yang diinput di form login
        $post = $this->request->getPost();
        $query = $this->db->table('users')->getWhere(['username' => $post['username']]);
        $user = $query->getRow();
        // dd($user);
        //mengecek keseuaian email
        if ($user) {
            //mengecek kesesuaian password
            if (password_verify($post['password'], $user->password_user)) {
                //Membuat session
                $params = [
                    'id_user' => $user->id_user,
                ];
                session()->set($params);
                //Direct ke home jika email dan password benar 
                return redirect()->to(site_url('home'));
            } else {
                //jika password salah
                return redirect()->back()->with('error', 'Password tidak sesuai.');
            }
        } else {
            //jika email salah
            return redirect()->back()->with('error', 'Username tidak terdaftar.');
        }
    }

    public function ubahpassword()
    {
        return view('layout/ubahpassword');
    }

    public function updatepassword($id = null)
    {
        $password_old = $this->request->getPost('password_old');
        // dd($password_old);
        $password_new = $this->request->getPost('password_user');
        $password_new2 = $this->request->getPost('password_user2');
        $user = $this->db->table('users')->getWhere(['id_user' => userLogin()->id_user]);
        $user = $user->getRow();
        if (password_verify($password_old, $user->password_user)) {
            $data = [
                'name_user' => $user->name_user,
                'username' => $user->username,
                'id_bg' => $user->id_bg,
                'role' => $user->role,
                'password_user' => $password_new,
                'password_user2' => $password_new2
            ];
            $save = $this->us->save($data);
            if (!$save) {
                return redirect()->back()->withInput()->with('errors', $this->us->errors());
            } else {
                $pass = password_hash(($password_new), PASSWORD_BCRYPT);
                $param = [
                    'id_user'       => userLogin()->id_user,
                    'password_user' => $pass
                ];
                $this->us->save($param);
                session()->remove('id_user');
                return redirect()->to(site_url('login'))->with('success', 'Password berhasil diubah. Silahkan login kembali');
            }
        } else {
            return redirect()->back()->with('error', 'Pastikan password lama yang anda masukkan sudah benar.');
        }
    }

    public function logout()
    {
        session()->remove('id_user');
        return redirect()->to(site_url('login'));
    }
}
