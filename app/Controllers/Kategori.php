<?php

namespace App\Controllers;

use App\Models\KesulitanModel;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $kesulitanModel;
    protected $kategoriModel;
    public function __construct()
    {
        $this->kesulitanModel  = new KesulitanModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function view()
    {
        $data = [
            'title' => 'Kategori',
            'kategori' => $this->kategoriModel->orderBy('id', 'desc')->findAll(),
            'kesulitan'  => $this->kesulitanModel
        ];
        return view('admin/kategori/data_kategori', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Kategori',
            'kesulitan'  => $this->kesulitanModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/kategori/add_kategori', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Kategori',
            'kesulitan'  => $this->kesulitanModel->findAll(),
            'kategori'  => $this->kategoriModel->where(['id_kesulitan' => $id])->first(),
            'id_kesulitan'  => $this->kesulitanModel->where(['id' => $id])->first(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/kategori/update_kategori', $data);
    }

    public function save()
    {
        $request = \Config\Services::request();
        if (!$this->validate(
            [
                'id_kesulitan' => [
                    'rules' => 'required|is_unique[kategori.id_kesulitan]',
                    'errors' => [
                        'required' => 'Id Kesulitan harus diisi',
                        'is_unique' => 'Id Kesulitan sudah digunakan'
                    ],
                ],
                'nama_kategori' => [
                    'rules' => 'required|is_unique[kategori.nama_kategori]',
                    'errors' => [
                        'required' => 'Id Kesulitan harus diisi',
                        'is_unique' => 'Id Kesulitan sudah digunakan'
                    ],
                ],
                'deskripsi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Deskripsi harus diisi',
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

            return redirect()->to('/admin/add_kategori')->withInput();
        }

        $fotoProfile = $request->getFile('foto');

        if ($fotoProfile->getError() == 4) {
            $fotoName = 'picture.png';
        } else {
            $fotoName = $fotoProfile->getRandomName();
            $fotoProfile->move('img/kategori', $fotoName);
        }

        $this->kategoriModel->save([
            'id_kesulitan' => $request->getVar('id_kesulitan'),
            'nama_kategori' => $request->getVar('nama_kategori'),
            'deskripsi' => $request->getVar('deskripsi'),
            'foto' => $fotoName,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin/data_kategori');
    }

    public function update($id)
    {
        $request = \Config\Services::request();
        $kategori = $this->kategoriModel->where(['id' => $id])->first();
        $id_kesulitan = $request->getVar('id_kesulitan');
        $nama_kategori = $request->getVar('nama_kategori');
        if ($id_kesulitan == $kategori['id_kesulitan']) {
            $rules = 'required';
        } else {
            $rules = 'required|is_unique[kategori.id_kesulitan]';
        }

        if ($nama_kategori == $kategori['nama_kategori']) {
            $rules_nama = 'required';
        } else {
            $rules_nama = 'required|is_unique[kategori.nama_kategori]';
        }
        if (!$this->validate(
            [
                'id_kesulitan' => [
                    'rules' => $rules,
                    'errors' => [
                        'required' => 'Id Kesulitan harus diisi',
                        'is_unique' => 'Id Kesulitan sudah digunakan'
                    ],
                ],
                'nama_kategori' => [
                    'rules' => $rules_nama,
                    'errors' => [
                        'required' => 'Id Kesulitan harus diisi',
                        'is_unique' => 'Id Kesulitan sudah digunakan'
                    ],
                ],
                'deskripsi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Deskripsi harus diisi',
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

            return redirect()->to('/admin/add_kategori')->withInput();
        }

        $fotoProfile = $request->getFile('foto');
        $fotoLama = $request->getVar('fotoLama');

        if ($fotoProfile->getError() == 4) {
            $fotoName = 'picture.png';
        } else {
            $fotoName = $fotoProfile->getRandomName();
            $fotoProfile->move('img/kategori', $fotoName);
            if ($fotoLama != 'picture.png') {
                unlink('img/kategori/' . $fotoLama);
            }
        }

        $this->kategoriModel->save([
            'id' => $id,
            'id_kesulitan' => $request->getVar('id_kesulitan'),
            'nama_kategori' => $request->getVar('nama_kategori'),
            'deskripsi' => $request->getVar('deskripsi'),
            'logo' => $fotoName,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin/data_kategori');
    }

    public function delete($id)
    {
        $this->kategoriModel->delete($id);
        session()->getFlashdata('pesan', 'data berhasil dihapus');
        return redirect()->to('/admin/data_kategori');
    }
}