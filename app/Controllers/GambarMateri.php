<?php

namespace App\Controllers;

use App\Models\GambarMateriModel;
use App\Models\MateriModel;

class GambarMateri extends BaseController
{
    protected $materiModel;
    protected $gambarMateriModel;
    public function __construct()
    {
        $this->materiModel  = new MateriModel();
        $this->gambarMateriModel = new GambarMateriModel();
    }

    public function view()
    {
        $data = [
            'title' => 'Gambar Materi',
            'gambar_materi' => $this->gambarMateriModel->orderBy('id', 'desc')->findAll(),
            'materi'  => $this->materiModel
        ];
        return view('admin/gambar_materi/data_gambar_materi', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Gambar Materi',
            'materi'  => $this->materiModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/gambar_materi/add_gambar_materi', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Gambar Materi',
            'materi'  => $this->materiModel->findAll(),
            'gambar_materi'  => $this->gambarMateriModel->where(['id_materi' => $id])->first(),
            'id_materi'  => $this->materiModel->where(['id' => $id])->first(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/gambar_materi/update_gambar_materi', $data);
    }

    public function save()
    {
        $request = \Config\Services::request();
        if (!$this->validate(
            [
                'id_materi' => [
                    'rules' => 'required|is_unique[gambar_materi.id_materi]',
                    'errors' => [
                        'required' => 'Id Kesulitan harus diisi',
                        'is_unique' => 'Id Kesulitan sudah digunakan'
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

            return redirect()->to('/admin/add_gambar_materi')->withInput();
        }

        $fotoProfile = $request->getFile('foto');

        if ($fotoProfile->getError() == 4) {
            $fotoName = 'picture.png';
        } else {
            $fotoName = $fotoProfile->getRandomName();
            $fotoProfile->move('img/materi/gambar', $fotoName);
        }

        $this->gambarMateriModel->save([
            'id_materi' => $request->getVar('id_materi'),
            'alt_text' => $request->getVar('alt_text'),
            'foto' => $fotoName,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin/data_gambar_materi');
    }

    public function update($id)
    {
        $request = \Config\Services::request();
        $gambar_materi = $this->gambarMateriModel->where(['id' => $id])->first();
        $id_materi = $request->getVar('id_materi');
        if ($id_materi == $gambar_materi['id_materi']) {
            $rules = 'required';
        } else {
            $rules = 'required|is_unique[gambar_materi.id_materi]';
        }
        if (!$this->validate(
            [
                'id_materi' => [
                    'rules' => $rules,
                    'errors' => [
                        'required' => 'Id Kesulitan harus diisi',
                        'is_unique' => 'Id Kesulitan sudah digunakan'
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

            return redirect()->to('/admin/add_gambar_materi')->withInput();
        }

        $fotoProfile = $request->getFile('foto');
        $fotoLama = $request->getVar('fotoLama');

        if ($fotoProfile->getError() == 4) {
            $fotoName = 'picture.png';
        } else {
            $fotoName = $fotoProfile->getRandomName();
            $fotoProfile->move('img/materi/gambar', $fotoName);
            if ($fotoLama != 'picture.png') {
                if (file_exists('/img/materi/gambar/' . $fotoLama)) {
                    unlink('/img/materi/gambar/' . $fotoLama);
                }
            }
        }

        $this->gambarMateriModel->save([
            'id' => $id,
            'id_materi' => $request->getVar('id_materi'),
            'alt_text' => $request->getVar('alt_text'),
            'foto' => $fotoName,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/admin/data_gambar_materi');
    }

    public function delete($id)
    {
        $gambar_materi = $this->gambarMateriModel->where(['id' => $id])->first();
        if ($gambar_materi['foto'] != 'picture.png') {
            unlink('/img/materi/gambar/' . $gambar_materi['foto']);
        }
        $this->gambarMateriModel->delete($id);
        session()->getFlashdata('pesan', 'data berhasil dihapus');
        return redirect()->to('/admin/data_gambar_materi');
    }
}
