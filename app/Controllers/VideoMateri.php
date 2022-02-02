<?php

namespace App\Controllers;

use App\Models\MateriModel;
use App\Models\VideoMateriModel;

class VideoMateri extends BaseController
{
    protected $materiModel;
    protected $videoMateriModel;
    public function __construct()
    {
        $this->materiModel  = new MateriModel();
        $this->videoMateriModel = new VideoMateriModel();
    }

    public function view()
    {
        $data = [
            'title' => 'Video Materi',
            'video_materi' => $this->videoMateriModel->orderBy('id', 'desc')->findAll(),
            'materi'  => $this->materiModel
        ];
        return view('admin/video_materi/data_video_materi', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Video Materi',
            'materi'  => $this->materiModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/video_materi/add_video_materi', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Video Materi',
            'materi'  => $this->materiModel->findAll(),
            'video_materi'  => $this->videoMateriModel->where(['id_materi' => $id])->first(),
            'id_materi'  => $this->materiModel->where(['id' => $id])->first(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/video_materi/update_video_materi', $data);
    }

    public function save()
    {
        $request = \Config\Services::request();
        if (!$this->validate(
            [
                'id_materi' => [
                    'rules' => 'required|is_unique[video_materi.id_materi]',
                    'errors' => [
                        'required' => 'Id Materi harus diisi',
                        'is_unique' => 'Id Materi sudah digunakan'
                    ],
                ],
                'alt_text' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Video harus diisi',
                    ]
                ],
                'video_resource' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Link Video harus diisi',
                    ]
                ],
            ]
        )) {

            return redirect()->to('/admin/add_video_materi')->withInput();
        }

        $this->videoMateriModel->save([
            'id_materi' => $request->getVar('id_materi'),
            'alt_text' => $request->getVar('alt_text'),
            'video_resource' => $request->getVar('video_resource'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin/data_video_materi');
    }

    public function update($id)
    {
        $request = \Config\Services::request();
        $video_materi = $this->videoMateriModel->where(['id' => $id])->first();
        $id_materi = $request->getVar('id_materi');
        if ($id_materi == $video_materi['id_materi']) {
            $rules = 'required';
        } else {
            $rules = 'required|is_unique[video_materi.id_materi]';
        }
        if (!$this->validate(
            [
                'id_materi' => [
                    'rules' => $rules,
                    'errors' => [
                        'required' => 'Id Materi harus diisi',
                        'is_unique' => 'Id Materi sudah digunakan'
                    ],
                ],
                'alt_text' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Video harus diisi',
                    ]
                ],
                'video_resource' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Link Video harus diisi',
                    ]
                ],

            ]
        )) {

            return redirect()->to('/admin/add_video_materi')->withInput();
        }

        $this->videoMateriModel->save([
            'id' => $id,
            'id_materi' => $request->getVar('id_materi'),
            'alt_text' => $request->getVar('alt_text'),
            'video_resource' => $request->getVar('video_resource'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/admin/data_video_materi');
    }

    public function delete($id)
    {
        $this->videoMateriModel->delete($id);
        session()->getFlashdata('pesan', 'data berhasil dihapus');
        return redirect()->to('/admin/data_video_materi');
    }
}
