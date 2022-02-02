<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\TipsModel;

class Tips extends BaseController
{
    protected $kategoriModel;
    protected $tipsModel;
    public function __construct()
    {
        $this->kategoriModel  = new KategoriModel();
        $this->tipsModel = new TipsModel();
    }

    public function view()
    {
        $data = [
            'title' => 'Tips',
            'tips' => $this->tipsModel->orderBy('id', 'desc')->findAll(),
            'kategori'  => $this->kategoriModel
        ];
        return view('admin/tips/data_tips', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tips',
            'kategori'  => $this->kategoriModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/tips/add_tips', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Tips',
            'kategori'  => $this->kategoriModel->findAll(),
            'tips'  => $this->tipsModel->where(['id_kategori' => $id])->first(),
            'id_kategori'  => $this->kategoriModel->where(['id' => $id])->first(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/tips/update_tips', $data);
    }

    public function save()
    {
        $request = \Config\Services::request();
        if (!$this->validate(
            [
                'id_kategori' => [
                    'rules' => 'required|is_unique[tips.id_kategori]',
                    'errors' => [
                        'required' => 'Id Modul harus diisi',
                        'is_unique' => 'Id Modul sudah digunakan'
                    ],
                ],
                'judul_tips' => [
                    'rules' => 'required|is_unique[tips.judul_tips]',
                    'errors' => [
                        'required' => 'Judul Tips harus diisi',
                        'is_unique' => 'Judul Tips sudah digunakan'
                    ],
                ],
                'konten_tips' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Konten Tips harus diisi',
                    ]
                ],
            ]
        )) {

            return redirect()->to('/admin/add_tips')->withInput();
        }

        $this->tipsModel->save([
            'id_kategori' => $request->getVar('id_kategori'),
            'judul_tips' => $request->getVar('judul_tips'),
            'konten_tips' => $request->getVar('konten_tips'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin/data_tips');
    }

    public function update($id)
    {
        $request = \Config\Services::request();
        $tips = $this->tipsModel->where(['id' => $id])->first();
        $id_kategori = $request->getVar('id_kategori');
        $judul_tips = $request->getVar('judul_tips');
        if ($id_kategori == $tips['id_kategori']) {
            $rules = 'required';
        } else {
            $rules = 'required|is_unique[tips.id_kategori]';
        }

        if ($judul_tips == $tips['judul_tips']) {
            $rules_nama = 'required';
        } else {
            $rules_nama = 'required|is_unique[tips.judul_tips]';
        }
        if (!$this->validate(
            [
                'id_kategori' => [
                    'rules' => $rules,
                    'errors' => [
                        'required' => 'Id Modul harus diisi',
                        'is_unique' => 'Id Modul sudah digunakan'
                    ],
                ],
                'judul_tips' => [
                    'rules' => $rules_nama,
                    'errors' => [
                        'required' => 'Id Modul harus diisi',
                        'is_unique' => 'Id Modul sudah digunakan'
                    ],
                ],
                'konten_tips' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Konten Tips harus diisi',
                    ]
                ],
            ]
        )) {

            return redirect()->to('/admin/add_tips')->withInput();
        }

        $this->tipsModel->save([
            'id' => $id,
            'id_kategori' => $request->getVar('id_kategori'),
            'judul_tips' => $request->getVar('judul_tips'),
            'konten_tips' => $request->getVar('konten_tips'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/admin/data_tips');
    }

    public function delete($id)
    {
        $this->tipsModel->delete($id);
        session()->getFlashdata('pesan', 'data berhasil dihapus');
        return redirect()->to('/admin/data_tips');
    }
}
