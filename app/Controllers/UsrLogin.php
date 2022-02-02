<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Validation\Rules;
use App\Models\UserModel;

class UsrLogin extends BaseController 
{
    public function login()
    {
      return view('user/login');  
    }
    public function process()
    {
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
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/login')->withInput();
        }

        $UserModel = new UserModel();
        $request = \Config\Services::request();
        $session =  session();
        $email = $request->getVar('email');
        $password = md5($request->getVar('password'));
        $data = $UserModel->where(['email' => $email])->first();
        if ($data) {
          if ($data['password'] == $password) {
                $ses_data = [
                    // 'id' => $data['id'],
                    'user_id' => $data['id'],
                    'nama_depan' => $data['nama_depan'],
                    'logged_in' => TRUE
                    // 'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/progressbelajar');
            } else {
                $session->setFlashdata('error', 'Password Salah ');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('error', 'Email Tidak Ditemukan');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}