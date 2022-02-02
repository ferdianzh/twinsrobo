<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

use App\Models\KelasModel;
use App\Models\MentorModel;
use App\Models\UserModel;

class Kelas extends BaseController
{
    protected $userModel;
    protected $kelasModel;
    protected $mentorModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new KelasModel();
        $this->mentorModel = new MentorModel();
    }
    public function view()
    {
        $data = [
            'title' => 'Kelas',
            'kelas'  => $this->kelasModel->orderBy('id', 'desc')->findAll(),
            'mentor'  => $this->mentorModel,
            'user'  => $this->userModel,
        ];
        return view('admin/kelas/data_kelas', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Kelas',
            'mentor'  => $this->mentorModel->findAll(),
            'user'  => $this->userModel,
            'validation' => \Config\Services::validation()
        ];
        return view('admin/kelas/add_kelas', $data);
    }

    public function edit($id)
    {
        $kelas = $this->kelasModel->where(['id_mentor' => $id])->first();
        $mentor_kelas = $this->mentorModel->where(['id' => $kelas['id_mentor']])->first();
        $user_mentor = $this->userModel->where(['id' => $mentor_kelas['id_user']])->first();
        $mentor = $this->mentorModel->findAll();
        $dt_user = $this->userModel;
        $data = [
            'title' => 'Kelas',
            'user'  => $dt_user,
            'user_mentor'  => $user_mentor,
            'kelas'  => $kelas,
            'mentor'  => $mentor,
            'validation' => \Config\Services::validation()
        ];
        return view('admin/kelas/update_kelas', $data);
    }

    public function save()
    {
        $request = \Config\Services::request();
        if (!$this->validate(
            [
                'id_mentor' => [
                    'rules' => 'required|is_unique[kelas.id_mentor]',
                    'errors' => [
                        'required' => 'Id Mentor harus diisi',
                        'is_unique' => 'Id Mentor sudah digunakan'
                    ],
                ],
                'nama_kelas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Kelas harus diisi',
                    ]
                ],
                'deskripsi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Deskripsi harus diisi',
                    ]
                ],
            ]
        )) {

            return redirect()->to('/admin/add_kelas')->withInput();
        }

        $this->kelasModel->save([
            'id_mentor' => $request->getVar('id_mentor'),
            'nama_kelas' => $request->getVar('nama_kelas'),
            'deskripsi' => $request->getVar('deskripsi'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin/data_kelas');
    }

    public function update($id)
    {
        $request = \Config\Services::request();
        $siswa = $this->kelasModel->where(['id' => $id])->first();
        $id_user = $request->getVar('id_user');
        if ($id_user == $siswa['id_user']) {
            $rules = 'required';
        } else {
            $rules = 'required|is_unique[kelas.id_mentor]';
        }
        if (!$this->validate(
            [
                'id_mentor' => [
                    'rules' => $rules,
                    'errors' => [
                        'required' => 'Id Mentor harus diisi',
                        'is_unique' => 'Id Mentor sudah digunakan'
                    ],
                ],
                'nama_kelas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Kelas harus diisi',
                    ]
                ],
                'deskripsi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Deskripsi harus diisi',
                    ]
                ],
            ]
        )) {

            return redirect()->to('/update_kelas')->withInput();
        }

        $this->kelasModel->save([
            'id' => $id,
            'id_mentor' => $request->getVar('id_mentor'),
            'nama_kelas' => $request->getVar('nama_kelas'),
            'deskripsi' => $request->getVar('deskripsi'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/admin/data_kelas');
    }

    public function delete($id)
    {
        $this->kelasModel->delete($id);
        session()->getFlashdata('pesan', 'data berhasil dihapus');
        return redirect()->to('/admin/data_kelas');
    }

    // REST API
    use ResponseTrait;

    // admin@gmail.com, pw:adminadmin
    public function restGetAll()
    {
        $data = $this->kelasModel->findAll();
        return $this->respond($data);
    }
    public function restGet($id)
    {
        $data = $this->kelasModel->getWhere(['id' => $id])->getResult();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound("Data not found with id = " . $id);
        }
    }
}
