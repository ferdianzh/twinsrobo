<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Validation\Rules;
use App\Models\UserModel;

class UsrRegister extends BaseController 
{
  
    public function registration()
    {
      echo view('user/registration'); 
      
    }

    public function process ()
    {
      if (!$this->validate([
        'username' => [
            'rules' => 'required|min_length[4]|max_length[20]|is_unique[user.username]',
            'errors' => [
                'required' => '{field} Harus diisi',
                'min_length' => '{field} Minimal 4 Karakter',
                'is_unique' => 'Username sudah digunakan sebelumnya'
            ]
        ],
        'email' => [
          'rules' => 'required|min_length[4]|max_length[20]|is_unique[user.email]',
          'errors' => [
              'required' => '{field} Harus diisi',
              'is_unique' => 'Email sudah digunakan sebelumnya'
          ]
      ],

        'password' => [
          'rules' => 'required|min_length[4]|max_length[50]',
          'errors' => [
              'required' => '{field} Harus diisi',
              'min_length' => '{field} Minimal 4 Karakter',
              'max_length' => '{field} Maksimal 50 Karakter',
          ]
      ],
      'password1' => [
        'rules' => 'matches[password]',
        'errors' => [
            'matches' => 'Konfirmasi Password tidak sesuai dengan password',
        ]
      ],
      'nama_depan' => [
        'rules' => 'required|min_length[4]|max_length[100]',
        'errors' => [
            'required' => '{field} Harus diisi',
            'min_length' => '{field} Minimal 4 Karakter',
            'max_length' => '{field} Maksimal 100 Karakter',
        ]
      ],
      'nama_belakang' => [
        'rules' => 'required|min_length[4]|max_length[100]',
        'errors' => [
            'required' => '{field} Harus diisi',
            'min_length' => '{field} Minimal 4 Karakter',
            'max_length' => '{field} Maksimal 100 Karakter',
        ]
      ],
    ])) {
        session()->setFlashdata('error', $this->validator->listErrors());
        return redirect()->back()->withInput();
    }
  $user = new UserModel();
  $request = \Config\Services::request();
  $user->insert([
      'username' => $request->getVar('username'),
      'email' => $request->getVar('email'),
      'password' => md5($request->getVar('password')),
      'nama_depan' => $request->getVar('nama_depan'),
      'nama_belakang' => $request->getVar('nama_belakang')
  ]); 
  return redirect()->to('/login');
    }
}