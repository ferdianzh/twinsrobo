<?php

namespace App\Controllers;

use App\Models\TipsModel;
use App\Models\VideoTipsModel;

class VideoTips extends BaseController
{
    protected $tipsModel;
    protected $videoTipsModel;
    public function __construct()
    {
        $this->tipsModel  = new TipsModel();
        $this->videoTipsModel = new VideoTipsModel();
    }

    public function view()
    {
        $data = [
            'title' => 'Video Tips',
            'video_tips' => $this->videoTipsModel->orderBy('id', 'desc')->findAll(),
            'tips'  => $this->tipsModel
        ];
        return view('admin/video_tips/data_video_tips', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Video Tips',
            'tips'  => $this->tipsModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/video_tips/add_video_tips', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Video Tips',
            'tips'  => $this->tipsModel->findAll(),
            'video_tips'  => $this->videoTipsModel->where(['id_tips' => $id])->first(),
            'id_tips'  => $this->tipsModel->where(['id' => $id])->first(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/video_tips/update_video_tips', $data);
    }

    public function save()
    {
        $request = \Config\Services::request();
        if (!$this->validate(
            [
                'id_tips' => [
                    'rules' => 'required|is_unique[video_tips.id_tips]',
                    'errors' => [
                        'required' => 'Id Tips harus diisi',
                        'is_unique' => 'Id Tips sudah digunakan'
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

            return redirect()->to('/admin/add_video_tips')->withInput();
        }

        $this->videoTipsModel->save([
            'id_tips' => $request->getVar('id_tips'),
            'alt_text' => $request->getVar('alt_text'),
            'video_resource' => $request->getVar('video_resource'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin/data_video_tips');
    }

    public function update($id)
    {
        $request = \Config\Services::request();
        $video_tips = $this->videoTipsModel->where(['id' => $id])->first();
        $id_tips = $request->getVar('id_tips');
        if ($id_tips == $video_tips['id_tips']) {
            $rules = 'required';
        } else {
            $rules = 'required|is_unique[video_tips.id_tips]';
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

            return redirect()->to('/admin/add_video_tips')->withInput();
        }

        $this->videoTipsModel->save([
            'id' => $id,
            'id_tips' => $request->getVar('id_tips'),
            'alt_text' => $request->getVar('alt_text'),
            'video_resource' => $request->getVar('video_resource'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/admin/data_video_tips');
    }

    public function delete($id)
    {
        $this->videoTipsModel->delete($id);
        session()->getFlashdata('pesan', 'data berhasil dihapus');
        return redirect()->to('/admin/data_video_tips');
    }
}
