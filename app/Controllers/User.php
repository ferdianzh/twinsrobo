<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function view()
    {
        $user = $this->userModel->orderBy('id', 'desc')->findAll();
        $data = [
            'title' => 'User',
            'user' => $user
        ];
        return view('admin/users/data_users', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'User',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/users/add_users', $data);
    }

    public function edit($id)
    {
        $user = $this->userModel->where(['id' => $id])->first();
        $data = [
            'title' => 'User',
            'user' => $user,
            'validation' => \Config\Services::validation()
        ];
        return view('admin/users/update_users', $data);
    }

    public function save()
    {
        $request = \Config\Services::request();
        if (!$this->validate(
            [
                'nama_depan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama harus diisi'
                    ],
                ],
                'nama_belakang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama harus diisi'
                    ],
                ],
                'email' => [
                    'rules' => 'required|is_unique[user.email]',
                    'errors' => [
                        'required' => 'Email harus diisi',
                        'is_unique' => 'Email sudah digunakan'
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[8]',
                    'errors' => [
                        'required' => 'Password harus diisi',
                        'min_length' => 'Password harus berisi minimal 8 karakter'
                    ]
                ],
                'username' => [
                    'rules' => 'required|is_unique[user.username]',
                    'errors' => [
                        'required' => 'Username harus diisi',
                        'is_unique' => 'Username sudah digunakan'
                    ]
                ],
                'tanggal_lahir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Lahir harus diisi'
                    ]
                ],
                'jenis_kelamin' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Kelamin harus diisi'
                    ]
                ],
                'foto' => [
                    'rules' => 'max_size[foto, 5024]|is_image[foto]|mime_in[foto,image/jpg,image/JPG,image/jpeg,image/JPEG,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'File yang dipilih bukan gambar',
                        'mime_in' => 'File yang dipilih bukan gambar'

                    ]
                ]
            ]
        )) {
            return redirect()->to('/admin/add_users')->withInput();
        }

        $fotoProfile = $request->getFile('foto');

        if ($fotoProfile->getError() == 4) {
            $fotoName = 'user.png';
        } else {
            $fotoName = $fotoProfile->getRandomName();
            $fotoProfile->move('img/user', $fotoName);
        }
        // $newName = $fotoProfile->getRandomName();
        $password = $request->getVar('password');

        $this->userModel->save([
            'nama_depan' => $request->getVar('nama_depan'),
            'nama_belakang' => $request->getVar('nama_belakang'),
            'email' => $request->getVar('email'),
            'password' => md5($password),
            'username' => $request->getVar('username'),
            'tanggal_lahir' => $request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $request->getVar('jenis_kelamin'),
            'phone' => $request->getVar('phone'),
            'nationality' => $request->getVar('nationality'),
            'kota' => $request->getVar('kota'),
            'foto' => $fotoName
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin/data_users');
    }

    public function update($id)
    {
        $userData = $this->userModel->where(['id' => $id])->first();

        $request = \Config\Services::request();
        $email = $request->getVar('email');
        $username = $request->getVar('username');
        $password = $request->getVar('password');
        if ($email == $userData['email']) {
            $rules = 'required';
        } else {
            $rules = 'required|is_unique[user.email]';
        }

        if ($username == $userData['username']) {
            $rules_username = 'required';
        } else {
            $rules_username = 'required|is_unique[user.username]';
        }

        if ($password == null) {
            $rules_password = 'required|min_length[0]';
            $dataPassword = $password;
        } else {
            $rules_password = 'required|min_length[8]';
            $dataPassword = md5($password);
        }
        if (!$this->validate(
            [
                'nama_depan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama harus diisi'
                    ],
                ],
                'nama_belakang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama harus diisi'
                    ],
                ],
                'email' => [
                    'rules' => $rules,
                    'errors' => [
                        'required' => 'Email harus diisi',
                        'is_unique' => 'Email sudah digunakan'
                    ]
                ],
                'password' => [
                    'rules' => $rules_password,
                    'errors' => [
                        'required' => 'Password harus diisi',
                        'min_length' => 'Password harus berisi minimal 8 karakter'
                    ]
                ],
                'username' => [
                    'rules' => $rules_username,
                    'errors' => [
                        'required' => 'Username harus diisi',
                        'is_unique' => 'Username sudah digunakan'
                    ]
                ],
                'tanggal_lahir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Lahir harus diisi'
                    ]
                ],
                'jenis_kelamin' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Kelamin harus diisi'
                    ]
                ],
                'foto' => [
                    'rules' => 'max_size[foto, 5024]|is_image[foto]|mime_in[foto,image/jpg,image/JPG,image/jpeg,image/JPEG,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'File yang dipilih bukan gambar',
                        'mime_in' => 'File yang dipilih bukan gambar'

                    ]
                ]
            ]
        )) {
            return redirect()->to('/admin/add_users')->withInput();
        }

        $fotoProfile = $request->getFile('foto');
        $fotoLama = $request->getVar('fotoLama');
        // var_dump($fotoLama); die;

        if ($fotoProfile->getError() == 4) {
            $fotoName = 'user.png';
        } else {
            $fotoName = $fotoProfile->getRandomName();
            $fotoProfile->move('img/user', $fotoName);
            if ($fotoLama != 'user.png') {
                unlink('img/user/' . $fotoLama);
            }
        }
        // $newName = $fotoProfile->getRandomName();
        $password = $request->getVar('password');

        $this->userModel->save([
            'id' => $id,
            'nama_depan' => $request->getVar('nama_depan'),
            'nama_belakang' => $request->getVar('nama_belakang'),
            'email' => $email,
            // 'password' => $dataPassword,
            'username' => $username,
            'tanggal_lahir' => $request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $request->getVar('jenis_kelamin'),
            'phone' => $request->getVar('phone'),
            'nationality' => $request->getVar('nationality'),
            'kota' => $request->getVar('kota'),
            'foto' => $fotoName
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/admin/data_users');
    }

    public function delete($id)
    {
        $user = $this->userModel->find($id);
        if ($user['foto'] != 'user.png') {
            if (unlink('assets/img/user/' . $user['foto'])) {
                unlink('assets/img/user/' . $user['foto']);
            }
        }
        $this->userModel->delete($id);
        session()->setFlashdata('pesan', 'data berhasil dihapus');
        return redirect()->to('/admin/data_users');
    }

}
