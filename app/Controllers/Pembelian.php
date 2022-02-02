<?php

namespace App\Controllers;

use App\Controllers\Api\MidtransCounterStore;
use App\Models\AtmModel;
use App\Models\ModulModel;
use App\Models\PembelianModel;
use App\Models\SiswaModel;
use App\Models\UserModel;

class Pembelian extends BaseController
{
    protected $userModel, $pembelianModel, $siswaModel, $atmModel, $modulModel;
    protected $midtransVA, $midtransCS;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->pembelianModel = new PembelianModel();
        $this->siswaModel = new SiswaModel();
        $this->atmModel = new AtmModel();
        $this->modulModel = new ModulModel();

        $this->midtransCS = new MidtransCounterStore();
    }
    public function view()
    {   
        $pembelian = $this->pembelianModel->select('pembelian.id as id, order_id, siswa.id as id_siswa, email, id_modul, pembelian.created_at as tanggal, status')->join('siswa', 'pembelian.id_siswa = siswa.id')->join('user', 'siswa.id_user = user.id')->orderBy('pembelian.created_at', 'desc')->findAll();

        $data = [
            'title' => 'Pembelian',
            'pembelian'  => $pembelian,
        ];
        return view('admin/pembelian/data_pembelian', $data);
    }

    public function add()
    {   
        $siswa = $this->siswaModel->select('siswa.id as id_siswa, id_user, nama_depan, nama_belakang, email, phone')->join('user', 'siswa.id_user = user.id')->findAll();
        $modul = $this->modulModel->findAll();

        $data = [
            'title' => 'Pembelian',
            'pembelian' => $this->pembelianModel->findAll(),
            'siswa' => $siswa,
            'modul' => $modul,
            'validation' => \Config\Services::validation()
        ];
        return view('admin/pembelian/add_pembelian', $data);
    }

    public function save()
    {
        $request = \Config\Services::request();
        if (!$this->validate(
            [
                'id_modul' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Id Siswa harus diisi',
                    ],
                ],
                'id_siswa' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Id ATM harus diisi',
                    ],
                ],
                'metode' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Metode pembayaran harus diisi',
                    ],
                ],
            ]
        )) {
            return redirect()->to('/admin/add_pembelian')->withInput();
        }

        $idSiswa = $request->getVar('id_siswa');
        $idModuls = $request->getVar('id_modul');

        $response = $this->midtransCS->charge();

        foreach ( $idModuls as $idModul ) {
            $this->pembelianModel->save([
                'order_id' => $response->order_id,
                'id_siswa' => $idSiswa,
                'id_modul' => $idModul,
                'rekening_penerima' => 'Twinsrobo-Midtrans',
            ]);
        }

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin/data_pembelian');
    }

    // public function edit($id)
    // {
    //     $kelas = $this->kelasModel->where(['id_mentor' => $id])->first();
    //     $mentor_kelas = $this->mentorModel->where(['id' => $kelas['id_mentor']])->first();
    //     $user_mentor = $this->userModel->where(['id' => $mentor_kelas['id_user']])->first();
    //     $mentor = $this->mentorModel->findAll();
    //     $dt_user = $this->userModel;
    //     $data = [
    //         'title' => 'Kelas',
    //         'user'  => $dt_user,
    //         'user_mentor'  => $user_mentor,
    //         'kelas'  => $kelas,
    //         'mentor'  => $mentor,
    //         'validation' => \Config\Services::validation()
    //     ];
    //     return view('admin/kelas/update_kelas', $data);
    // }

    // public function save()
    // {
    //     $request = \Config\Services::request();
    //     if (!$this->validate(
    //         [
    //             'id_mentor' => [
    //                 'rules' => 'required|is_unique[kelas.id_mentor]',
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

    //         return redirect()->to('/add_kelas')->withInput();
    //     }

    //     $this->kelasModel->save([
    //         'id_mentor' => $request->getVar('id_mentor'),
    //         'nama_kelas' => $request->getVar('nama_kelas'),
    //         'deskripsi' => $request->getVar('deskripsi'),
    //     ]);

    //     session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

    //     return redirect()->to('/data_kelas');
    // }

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
        $this->pembelianModel->delete($id);
        session()->getFlashdata('pesan', 'data berhasil dihapus');
        return redirect()->to('/admin/data_pembelian');
    }
}
