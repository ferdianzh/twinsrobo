<?php

namespace App\Controllers;

use App\Models\MateriModel;
use App\Models\ModulModel;

class Materi extends BaseController
{
    protected $modulModel;
    protected $materiModel;
    public function __construct()
    {
        $this->modulModel  = new ModulModel();
        $this->materiModel = new MateriModel();
    }

    public function view()
    {
        $data = [
            'title' => 'Materi',
            'materi' => $this->materiModel->orderBy('id', 'desc')->findAll(),
            'modul'  => $this->modulModel
        ];
        return view('admin/materi/data_materi', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Materi',
            'modul'  => $this->modulModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/materi/add_materi', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Materi',
            'modul'  => $this->modulModel->findAll(),
            'materi'  => $this->materiModel->where(['id_modul' => $id])->first(),
            'id_modul'  => $this->modulModel->where(['id' => $id])->first(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/materi/update_materi', $data);
    }

    public function save()
    {
        $request = \Config\Services::request();
        if (!$this->validate(
            [
                'id_modul' => [
                    'rules' => 'required|is_unique[materi.id_modul]',
                    'errors' => [
                        'required' => 'Id Modul harus diisi',
                        'is_unique' => 'Id Modul sudah digunakan'
                    ],
                ],
                'judul_materi' => [
                    'rules' => 'required|is_unique[materi.judul_materi]',
                    'errors' => [
                        'required' => 'Judul Materi harus diisi',
                        'is_unique' => 'Judul Materi sudah digunakan'
                    ],
                ],
                'konten_materi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Konten Materi harus diisi',
                    ]
                ],
            ]
        )) {

            return redirect()->to('/admin/add_materi')->withInput();
        }

        $this->materiModel->save([
            'id_modul' => $request->getVar('id_modul'),
            'judul_materi' => $request->getVar('judul_materi'),
            'konten_materi' => $request->getVar('konten_materi'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin/data_materi');
    }

    public function update($id)
    {
        $request = \Config\Services::request();
        $materi = $this->materiModel->where(['id' => $id])->first();
        $id_modul = $request->getVar('id_modul');
        $judul_materi = $request->getVar('judul_materi');
        if ($id_modul == $materi['id_modul']) {
            $rules = 'required';
        } else {
            $rules = 'required|is_unique[materi.id_modul]';
        }

        if ($judul_materi == $materi['judul_materi']) {
            $rules_nama = 'required';
        } else {
            $rules_nama = 'required|is_unique[materi.judul_materi]';
        }
        if (!$this->validate(
            [
                'id_modul' => [
                    'rules' => $rules,
                    'errors' => [
                        'required' => 'Id Modul harus diisi',
                        'is_unique' => 'Id Modul sudah digunakan'
                    ],
                ],
                'judul_materi' => [
                    'rules' => $rules_nama,
                    'errors' => [
                        'required' => 'Id Modul harus diisi',
                        'is_unique' => 'Id Modul sudah digunakan'
                    ],
                ],
                'konten_materi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Konten Materi harus diisi',
                    ]
                ],
            ]
        )) {

            return redirect()->to('/admin/add_materi')->withInput();
        }

        $this->materiModel->save([
            'id' => $id,
            'id_modul' => $request->getVar('id_modul'),
            'judul_materi' => $request->getVar('judul_materi'),
            'konten_materi' => $request->getVar('konten_materi'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/admin/data_materi');
    }

    public function delete($id)
    {
        $this->materiModel->delete($id);
        session()->getFlashdata('pesan', 'data berhasil dihapus');
        return redirect()->to('/admin/data_materi');
    }
}
