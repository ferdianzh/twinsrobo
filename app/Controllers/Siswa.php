<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\UserModel;

class Siswa extends BaseController
{
    protected $userModel;
    protected $siswaModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->siswaModel = new SiswaModel();
    }
    public function view()
    {
        $data = [
            'title' => 'Siswa',
            'siswa'  => $this->siswaModel->orderBy('id', 'desc')->findAll(),
            'user'  => $this->userModel
        ];
        return view('admin/siswa/data_siswa', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Siswa',
            'user'  => $this->userModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/siswa/add_siswa', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Siswa',
            'user'  => $this->userModel->findAll(),
            'siswa'  => $this->siswaModel->where(['id_user' => $id])->first(),
            'dt_user'  => $this->userModel->where(['id' => $id])->first(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/siswa/update_siswa', $data);
    }

    public function save()
    {
        $request = \Config\Services::request();
        if (!$this->validate(
            [
                'id_user' => [
                    'rules' => 'required|is_unique[siswa.id_user]',
                    'errors' => [
                        'required' => 'Id User harus diisi',
                        'is_unique' => 'Id User sudah digunakan'
                    ],
                ],
                'nama_sekolah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Sekolah harus diisi',
                    ]
                ],
            ]
        )) {

            return redirect()->to('/admin/add_siswa')->withInput();
        }

        $this->siswaModel->save([
            'id_user' => $request->getVar('id_user'),
            'nama_sekolah' => $request->getVar('nama_sekolah'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin/data_siswa');
    }

    public function update($id)
    {
        $request = \Config\Services::request();
        $siswa = $this->siswaModel->where(['id' => $id])->first();
        $id_user = $request->getVar('id_user');
        if ($id_user == $siswa['id_user']) {
            $rules = 'required';
        } else {
            $rules = 'required|is_unique[siswa.id_user]';
        }
        if (!$this->validate(
            [
                'id_user' => [
                    'rules' => $rules,
                    'errors' => [
                        'required' => 'Id User harus diisi',
                        'is_unique' => 'Id User sudah digunakan'
                    ],
                ],
                'nama_sekolah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Sekolah harus diisi',
                    ]
                ],
            ]
        )) {

            return redirect()->to('/admin/update_siswa/' . $id)->withInput();
        }

        $this->siswaModel->save([
            'id' => $id,
            'id_user' => $request->getVar('id_user'),
            'nama_sekolah' => $request->getVar('nama_sekolah'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/admin/data_siswa');
    }

    public function delete($id)
    {
        $this->siswaModel->delete($id);
        session()->getFlashdata('pesan', 'data berhasil dihapus');
        return redirect()->to('/admin/data_siswa');
    }
}
