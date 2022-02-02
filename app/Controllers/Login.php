<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\MentorModel;
use App\Models\UserModel;

class Login extends BaseController
{
    protected $adminModel;
    public function __construct()
    {
        $this->adminModel = new AdminModel();
        // mentor login
        $this->userModel = new UserModel();
        $this->mentorModel = new MentorModel();
    }

    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('/templates/login', $data);
    }

    public function admin()
    {
        if (session()->get('logged_in')) {
            $data = [
                'judul' => 'Admin',
                'id' => session()->get('id'),
                'tipe_admin' => session()->get('tipe_admin'),
                'nama'     => session()->get('nama'),
                // 'email'     => session()->get('email'),
                // 'password'     => session()->get('password'),
                'foto'     => session()->get('foto'),
            ];
            return view('admin/profile/v_profile', $data);
        } else {
            return redirect()->to('/admin/login');
        }
    }

    public function auth()
    {
        $request = \Config\Services::request();
        if (!$this->validate(
            [
                'email' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Email harus diisi'
                    ],
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password harus diisi'
                    ],
                ],
            ]
        )) {
            return redirect()->to('/admin/login')->withInput();
        }


        $session =  session();
        $email = $request->getVar('email');
        $password = md5($request->getVar('password'));
        $data = $this->adminModel->where(['email' => $email])->first();
        if ($data) {
            $pass = $data['password'];
            // $verify_pass = password_verify($password, $pass);
            if ($password === $pass) {
                $ses_data = [
                    'id'        => $data['id'],
                    'nama'      => $data['nama'],
                    'email'     => $data['email'],
                    // 'password'  => $data['password'],
                    'tipe_admin' => $data['tipe_admin'],
                    'foto'     => $data['foto'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/admin/');
            } else {
                $session->setFlashdata('password', 'Password Salah ');
                return redirect()->to('/admin/login');
            }
        } else {
            // join user and mentor to user_mentor
            $mentor = $this->mentorModel->join('user', 'user.id = mentor.id_user', 'left');
            $mentor = $mentor->where(['email' => $email])->first();
            if ( $mentor ) {
                if ( $password == $mentor['password'] ) {
                    $ses_data = [
                        'id'        => $mentor['id'],
                        'nama'      => $mentor['nama_depan'],
                        'email'     => $mentor['email'],
                        'tipe_admin' => 'Mentor',
                        'foto'     => $mentor['foto'],
                        'logged_in' => TRUE
                    ];
                    $session->set($ses_data);
                    return redirect()->to('/admin/');
                } else {
                    $session->setFlashdata('password', 'Password Salah ');
                    return redirect()->to('/admin/login');
                }
            } else {
                $session->setFlashdata('email', 'Email Tidak Ditemukan');
                return redirect()->to('/admin/login');
            }
        }
    }

    public function logout()
    {
        if ( !is_null(session()->get('user_id')) ) {
            $admin_sess = ['id', 'nama', 'email', 'tipe_admin', 'foto'];
            session()->remove($admin_sess);
        } else {
            session()->destroy();
        }
        return redirect()->to('index');
    }
}
