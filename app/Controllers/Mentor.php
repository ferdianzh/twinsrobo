<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

use App\Models\UserModel;
use App\Models\MentorModel;

class Mentor extends BaseController
{
    protected $userModel;
    protected $mentorModel;
    public function __construct()
    {
        $this->userModel  = new UserModel();
        $this->mentorModel = new MentorModel();
    }

    public function view()
    {
        $data = [
            'title' => 'Mentor',
            'mentor' => $this->mentorModel->orderBy('id', 'desc')->findAll(),
            'user'  => $this->userModel
        ];
        return view('admin/mentor/data_mentor', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Mentor',
            'user'  => $this->userModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/mentor/add_mentor', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Siswa',
            'user'  => $this->userModel->findAll(),
            'mentor'  => $this->mentorModel->where(['id_user' => $id])->first(),
            'dt_user'  => $this->userModel->where(['id' => $id])->first(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/mentor/update_mentor', $data);
    }

    public function save()
    {
        $request = \Config\Services::request();
        if (!$this->validate(
            [
                'id_user' => [
                    'rules' => 'required|is_unique[mentor.id_user]',
                    'errors' => [
                        'required' => 'Id User harus diisi',
                        'is_unique' => 'Id User sudah digunakan'
                    ],
                ],
                'deskripsi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Deskripsi harus diisi',
                    ]
                ],
            ]
        )) {

            return redirect()->to('/admin/add_mentor')->withInput();
        }

        $this->mentorModel->save([
            'id_user' => $request->getVar('id_user'),
            'deskripsi_singkat' => $request->getVar('deskripsi'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin/data_mentor');
    }

    public function update($id)
    {
        $request = \Config\Services::request();
        $mentor = $this->mentorModel->where(['id' => $id])->first();
        $id_user = $request->getVar('id_user');
        if ($id_user == $mentor['id_user']) {
            $rules = 'required';
        } else {
            $rules = 'required|is_unique[mentor.id_user]';
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
                'deskripsi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Deskripsi harus diisi',
                    ]
                ],
            ]
        )) {

            return redirect()->to('/update_mentor')->withInput();
        }

        $this->mentorModel->save([
            'id' => $id,
            'id_user' => $request->getVar('id_user'),
            'deskripsi_singkat' => $request->getVar('deskripsi'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/admin/data_mentor');
    }

    public function delete($id)
    {
        $this->mentorModel->delete($id);
        session()->getFlashdata('pesan', 'data berhasil dihapus');
        return redirect()->to('/admin/data_mentor');
    }

    // REST API
    use ResponseTrait;

    // admin@gmail.com, pw:adminadmin
    public function restGetAll()
    {
        $data = $this->mentorModel->findAll();
        return $this->respond($data);
    }
    public function restGet($id)
    {
        $data = $this->mentorModel->getWhere(['id' => $id])->getResult();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound("Data not found with id = " . $id);
        }
    }
}
