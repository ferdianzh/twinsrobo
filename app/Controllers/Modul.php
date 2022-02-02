<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

use App\Models\KategoriModel;
use App\Models\ModulModel;
use App\Models\NotifikasiModel;
use App\Models\RiwayatPembelianModel;
use App\Models\SiswaModel;
use App\Models\UserModel;

class Modul extends BaseController
{
    // protected $modulModel;
    // protected $kategoriModel;
    public function __construct()
    {
        $this->modulModel  = new ModulModel();
        $this->kategoriModel = new KategoriModel();
        $this->userModel = new UserModel();
        $this->siswaModel = new SiswaModel();
        $this->riwayatPembelianModel = new RiwayatPembelianModel();
        $this->notifikasiModel = new NotifikasiModel();
    }

    public function view()
    {
        $data = [
            'title' => 'Modul',
            'modul' => $this->modulModel->orderBy('id', 'desc')->findAll(),
            'kategori'  => $this->kategoriModel
        ];
        return view('admin/modul/data_modul', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Modul',
            'kategori'  => $this->kategoriModel->findAll(),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/modul/add_modul', $data);
    }

    public function edit($id)
    {
        $id_kategori = $this->modulModel->select('id_kategori')->where('id', $id)->first();
        $data = [
            'title' => 'Modul',
            'kategori'  => $this->kategoriModel->findAll(),
            'modul'  => $this->modulModel->where(['id' => $id])->first(),
            'id_kategori'  => $this->kategoriModel->where(['id' => $id_kategori['id_kategori']])->first(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/modul/update_modul', $data);
    }

    public function save()
    {
        $request = \Config\Services::request();
        if (!$this->validate(
            [
                'id_kategori' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Id Kategori harus diisi',
                    ],
                ],
                'judul_modul' => [
                    'rules' => 'required|is_unique[modul.judul_modul]',
                    'errors' => [
                        'required' => 'Judul Modul harus diisi',
                        'is_unique' => 'Judul Modul sudah digunakan'
                    ],
                ],
                'harga_modul' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harga Modul harus diisi',
                    ]
                ],
                'deskripsi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Deskripsi harus diisi',
                    ]
                ],
                'logo' => [
                    'rules' => 'max_size[logo, 5024]|is_image[logo]|mime_in[logo,image/jpg,image/JPG,image/jpeg,image/JPEG,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'File yang dipilih bukan gambar',
                        'mime_in' => 'File yang dipilih bukan gambar'

                    ]
                ]
            ]
        )) {

            return redirect()->to('/admin/add_modul')->withInput();
        }

        $fotoProfile = $request->getFile('logo');

        if ($fotoProfile->getError() == 4) {
            $fotoName = 'picture.png';
        } else {
            $fotoName = $fotoProfile->getRandomName();
            $fotoProfile->move('img/modul', $fotoName);
        }

        $this->modulModel->save([
            'id_kategori' => $request->getVar('id_kategori'),
            'judul_modul' => $request->getVar('judul_modul'),
            'harga_modul' => $request->getVar('harga_modul'),
            'deskripsi' => $request->getVar('deskripsi'),
            'logo' => $fotoName,
        ]);

        $newModulId = $this->modulModel->getInsertID();
        $newModul = $this->modulModel->select('id, id_kategori, judul_modul')->where('id', $newModulId)->first();
        // $this->setNotification($newModul);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin/data_modul');
    }

    private function setNotification($newModul) {
        $idNewModul = $newModul['id'];
        $idKategoriModul = $newModul['id_kategori'];
        $judulModul = $newModul['judul_modul'];

        // modul -> get moduls with the same id_kategori as $newmodul
        $modul = $this->modulModel->where('id_kategori', $idKategoriModul)->findAll();
        $idModul = [];
        foreach ( $modul as $mdl ) {
            array_push($idModul, $mdl['id']);
        }

        // riwayat_pembelian -> get id_siswa that bought the moduls
        $siswa = $this->riwayatPembelianModel->select('id_siswa')->whereIn('id_modul', $idModul)->findAll();

        // notifikasi -> insert new data based on id_siswa and moduls
        $checkSiswa = [];
        foreach ( $siswa as $sis ) {
            if ( !in_array($sis['id_siswa'], $checkSiswa) ) {
                $deskripsiNotif = "Baru! " . $judulModul . ", asah terus kemampuanmu dengan ilmu baru";

                $data = [
                    'id_siswa'  => $sis['id_siswa'],
                    'id_modul'  => $idNewModul,
                    'status'    => 0,
                    'deskripsi' => $deskripsiNotif,
                ];
                $this->notifikasiModel->save($data);
                
                array_push($checkSiswa, $sis['id_siswa']);
            }
        }
    }

    public function update($id)
    {
        $request = \Config\Services::request();
        $modul = $this->modulModel->where(['id' => $id])->first();
        $id_kategori = $request->getVar('id_kategori');
        $judul_modul = $request->getVar('judul_modul');
        if ($id_kategori == $modul['id_kategori']) {
            $rules = 'required';
        } else {
            $rules = 'required|is_unique[modul.id_kategori]';
        }

        if ($judul_modul == $modul['judul_modul']) {
            $rules_nama = 'required';
        } else {
            $rules_nama = 'required|is_unique[modul.judul_modul]';
        }
        if (!$this->validate(
            [
                'id_kategori' => [
                    'rules' => $rules,
                    'errors' => [
                        'required' => 'Id Kategori harus diisi',
                        'is_unique' => 'Id Kategori sudah digunakan'
                    ],
                ],
                'judul_modul' => [
                    'rules' => $rules_nama,
                    'errors' => [
                        'required' => 'Judul Modul harus diisi',
                        'is_unique' => 'Judul Modul sudah digunakan'
                    ],
                ],
                'harga_modul' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harga Modul harus diisi',
                    ]
                ],
                'deskripsi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Deskripsi harus diisi',
                    ]
                ],
                'logo' => [
                    'rules' => 'max_size[logo, 5024]|is_image[logo]|mime_in[logo,image/jpg,image/JPG,image/jpeg,image/JPEG,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'File yang dipilih bukan gambar',
                        'mime_in' => 'File yang dipilih bukan gambar'

                    ]
                ]
            ]
        )) {

            return redirect()->to('/admin/add_modul')->withInput();
        }

        $fotoProfile = $request->getFile('logo');
        $fotoLama = $request->getVar('fotoLama');

        if ($fotoProfile->getError() == 4) {
            $fotoName = 'picture.png';
        } else {
            $fotoName = $fotoProfile->getRandomName();
            $fotoProfile->move('img/modul', $fotoName);
            if ($fotoLama != 'picture.png') {
                unlink('img/modul/' . $fotoLama);
            }
        }

        $this->modulModel->save([
            'id' => $id,
            'id_kategori' => $request->getVar('id_kategori'),
            'judul_modul' => $request->getVar('judul_modul'),
            'harga_modul' => $request->getVar('harga_modul'),
            'deskripsi' => $request->getVar('deskripsi'),
            'logo' => $fotoName,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/admin/data_modul');
    }

    public function delete($id)
    {
        $modul = $this->modulModel->where(['id' => $id])->first();
        if ($modul['logo'] != 'picture.png') {
            unlink('/img/modul/' . $modul['logo']);
        }
        $this->modulModel->delete($id);
        session()->getFlashdata('pesan', 'data berhasil dihapus');
        return redirect()->to('/admin/data_modul');
    }

    // REST API
    use ResponseTrait;

    public function restGetAll()
    {
        $data = $this->modulModel->findAll();
        return $this->respond($data);
    }
    public function restGet($id)
    {
        $data = $this->modulModel->getWhere(['id' => $id])->getResult();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound("Data not found with id = " . $id);
        }
    }

}
