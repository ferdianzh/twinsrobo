<?php

namespace App\Controllers;

use App\Controllers\Api\XenditController;
use App\Models\AtmModel;
use App\Models\SiswaModel;
use App\Models\UserModel;

class Atm extends BaseController
{
    protected $userModel, $atmModel, $siswaModel;
    protected $xendit;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->atmModel = new AtmModel();
        $this->siswaModel = new SiswaModel();
        $this->xendit = new XenditController();
    }
    public function view()
    {
        $data = [
            'title' => 'ATM',
            'atm'  => $this->atmModel->orderBy('id', 'desc')->findAll(),
            'siswa'  => $this->siswaModel,
            'user'  => $this->userModel,
        ];
        return view('admin/pembelian/data_atm', $data);
    }

    public function add()
    {
        $siswaQuery = $this->siswaModel->select('siswa.id as id_siswa, user.id, nama_depan, nama_belakang', false)->join('user', 'siswa.id_user = user.id', 'left', '')->findAll();

        $listVA = $this->xendit->getListVA();

        $data = [
            'title' => 'ATM',
            'siswa' => $siswaQuery,
            'banks' => $listVA,
            'validation' => \Config\Services::validation()
        ];
        return view('admin/pembelian/add_atm', $data);
    }

    public function edit($id)
    {
        $rekening = $this->atmModel->where(['id_siswa' => $id])->first();
        $idSiswa = $rekening['id_siswa'];
        $siswa = $this->siswaModel->join('user', 'user.id = siswa.id_user', 'left')->first();
        $data = [
            'title' => 'ATM',
            'atm' => $rekening,
            'siswa' => $siswa,
            'validation' => \Config\Services::validation(),
        ];

        // var_dump($data['siswa']); die;
        return view('admin/kelas/update_atm', $data);
    }

    public function save()
    {
        $request = \Config\Services::request();
        if (!$this->validate(
            [
                'id_siswa' => [
                    'rules' => 'required|is_unique[atm.id_siswa]',
                    'errors' => [
                        'required' => 'Id Siswa harus diisi',
                        'is_unique' => 'Id Siswa sudah digunakan'
                    ],
                ],
                'nama_bank' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Bank harus diisi',
                    ]
                ],
                'no_rekening' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'No. Rekening harus diisi',
                    ]
                ],
            ]
        )) {

            return redirect()->to('/admin/add_atm')->withInput();
        }

        $this->atmModel->save([
            'id_siswa' => $request->getVar('id_siswa'),
            'nama_bank' => $request->getVar('nama_bank'),
            'no_rekening' => $request->getVar('no_rekening'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin/data_atm');
    }

    // public function update($id)
    // {
    //     $request = \Config\Services::request();
    //     $siswa = $this->kelasModel->where(['id' => $id])->first();
    //     $id_user = $request->getVar('id_user');
    //     if ($id_user == $siswa['id_user']) {
    //         $rules = 'required';
    //     } else {
    //         $rules = 'required|is_unique[kelas.id_mentor]';
    //     }
    //     if (!$this->validate(
    //         [
    //             'id_mentor' => [
    //                 'rules' => $rules,
    //                 'errors' => [
    //                     'required' => 'Id Mentor harus diisi',
    //                     'is_unique' => 'Id Mentor sudah digunakan'
    //                 ],
    //             ],
    //             'nama_kelas' => [
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => 'Nama Kelas harus diisi',
    //                 ]
    //             ],
    //             'deskripsi' => [
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => 'Deskripsi harus diisi',
    //                 ]
    //             ],
    //         ]
    //     )) {

    //         return redirect()->to('/update_kelas')->withInput();
    //     }

    //     $this->kelasModel->save([
    //         'id' => $id,
    //         'id_mentor' => $request->getVar('id_mentor'),
    //         'nama_kelas' => $request->getVar('nama_kelas'),
    //         'deskripsi' => $request->getVar('deskripsi'),
    //     ]);

    //     session()->setFlashdata('pesan', 'Data berhasil diubah.');

    //     return redirect()->to('/data_kelas');
    // }

    public function delete($id)
    {
        $this->atmModel->delete($id);
        session()->getFlashdata('pesan', 'data berhasil dihapus');
        return redirect()->to('/admin/data_atm');
    }
}
