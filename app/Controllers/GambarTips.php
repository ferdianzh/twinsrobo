<?php

namespace App\Controllers;

use App\Models\GambarTipsModel;
use App\Models\TipsModel;

class GambarTips extends BaseController
{
    protected $tipsModel;
    protected $gambarTipsModel;
    public function __construct()
    {
        $this->tipsModel  = new TipsModel();
        $this->gambarTipsModel = new GambarTipsModel();
    }

    public function view()
    {
        $data = [
            'title' => 'Gambar Tips',
            'gambar_tips' => $this->gambarTipsModel->orderBy('id', 'desc')->findAll(),
            'tips'  => $this->tipsModel
        ];
        return view('admin/gambar_tips/data_gambar_tips', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Gambar Tips',
            'tips'  => $this->tipsModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/gambar_tips/add_gambar_tips', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Gambar Tips',
            'tips'  => $this->tipsModel->findAll(),
            'gambar_tips'  => $this->gambarTipsModel->where(['id_tips' => $id])->first(),
            'id_tips'  => $this->tipsModel->where(['id' => $id])->first(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/gambar_tips/update_gambar_tips', $data);
    }

    public function save()
    {
        $request = \Config\Services::request();
        if (!$this->validate(
            [
                'id_tips' => [
                    'rules' => 'required|is_unique[gambar_tips.id_tips]',
                    'errors' => [
                        'required' => 'Id Tips harus diisi',
                        'is_unique' => 'Id Tips sudah digunakan'
                    ],
                ],
                'alt_text' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Gambar harus diisi',
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

            return redirect()->to('/admin/add_gambar_tips')->withInput();
        }

        $fotoProfile = $request->getFile('foto');

        if ($fotoProfile->getError() == 4) {
            $fotoName = 'picture.png';
        } else {
            $fotoName = $fotoProfile->getRandomName();
            $fotoProfile->move('img/tips/gambar', $fotoName);
        }

        $this->gambarTipsModel->save([
            'id_tips' => $request->getVar('id_tips'),
            'alt_text' => $request->getVar('alt_text'),
            'foto' => $fotoName,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin/data_gambar_tips');
    }

    public function update($id)
    {
        $request = \Config\Services::request();
        $gambar_tips = $this->gambarTipsModel->where(['id' => $id])->first();
        $id_tips = $request->getVar('id_tips');
        if ($id_tips == $gambar_tips['id_tips']) {
            $rules = 'required';
        } else {
            $rules = 'required|is_unique[gambar_tips.id_tips]';
        }
        if (!$this->validate(
            [
                'id_tips' => [
                    'rules' => $rules,
                    'errors' => [
                        'required' => 'Id Tips harus diisi',
                        'is_unique' => 'Id Tips sudah digunakan'
                    ],
                ],
                'alt_text' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Gambar harus diisi',
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

            return redirect()->to('/admin/add_gambar_tips')->withInput();
        }

        $fotoProfile = $request->getFile('foto');
        $fotoLama = $request->getVar('fotoLama');

        if ($fotoProfile->getError() == 4) {
            $fotoName = 'picture.png';
        } else {
            $fotoName = $fotoProfile->getRandomName();
            $fotoProfile->move('img/tips/gambar', $fotoName);
            if ($fotoLama != 'picture.png') {
                unlink('/img/tips/gambar/' . $fotoLama);
            }
        }

        $this->gambarTipsModel->save([
            'id' => $id,
            'id_tips' => $request->getVar('id_tips'),
            'alt_text' => $request->getVar('alt_text'),
            'foto' => $fotoName,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/admin/data_gambar_tips');
    }

    public function delete($id)
    {
        $gambar_tips = $this->gambarTipsModel->where(['id' => $id])->first();
        if ($gambar_tips['foto'] != 'picture.png') {
            unlink('/img/tips/gambar/' . $gambar_tips['foto']);
        }
        $this->gambarTipsModel->delete($id);
        session()->getFlashdata('pesan', 'data berhasil dihapus');
        return redirect()->to('/admin/data_gambar_tips');
    }
}
