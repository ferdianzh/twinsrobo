<?php

namespace App\Controllers;

use App\Models\KesulitanModel;

class Kesulitan extends BaseController
{
    protected $kesulitanModel;
    public function __construct()
    {
        $this->kesulitanModel = new KesulitanModel();
    }
    public function view()
    {
        $kesulitan = $this->kesulitanModel->orderBy('id')->findAll();
        $data = [
            'title' => 'Tingkat Kesulitan',
            'kesulitan' => $kesulitan
        ];
        return view('admin/kesulitan/data_kesulitan', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tingkat Kesulitan',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/kesulitan/add_kesulitan', $data);
    }

    public function edit($id)
    {
        $kesulitan = $this->kesulitanModel->where(['id' => $id])->first();
        $data = [
            'title' => 'Tingkat Kesulitan',
            'kesulitan' => $kesulitan,
            'validation' => \Config\Services::validation()
        ];
        return view('admin/kesulitan/update_kesulitan', $data);
    }

    public function save()
    {
        $request = \Config\Services::request();
        if (!$this->validate(
            [
                'id' => [
                    'rules' => 'required|is_unique[kesulitan.id]',
                    'errors' => [
                        'required' => 'ID Kesulitan harus diisi',
                        'is_unique' => 'ID Kesulitan sudah ada',
                    ],
                ],
                'kesulitan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tingka Kesulitan harus diisi',
                        // 'is_unique' => 'Tingka Kesulitan sudah ada',
                    ],
                ],
                'skore' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Skore harus diisi'
                    ],
                ],
            ]
        )) {
            return redirect()->to('/admin/add_kesulitan')->withInput();
        }

        $this->kesulitanModel->insert([
            'id' => $request->getVar('id'),
            'kesulitan' => $request->getVar('kesulitan'),
            'skore' => $request->getVar('skore'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin/data_kesulitan');
    }

    public function update($id)
    {
        $request = \Config\Services::request();
        $kesulitan = $request->getVar('kesulitan');
        $dt_kesulitan = $this->kesulitanModel->where(['id' => $id])->first();
        if ($kesulitan == $dt_kesulitan['kesulitan']) {
            $rules = 'required';
        } else {
            $rules = 'required|is_unique[user.email]';
        }
        if (!$this->validate(
            [
                'id' => [
                    'rules' => $rules,
                    'errors' => [
                        'required' => 'ID Kesulitan harus diisi',
                        'is_unique' => 'ID Kesulitan sudah ada',
                    ],
                ],
                'kesulitan' => [
                    'rules' => $rules,
                    'errors' => [
                        'required' => 'Tingka Kesulitan harus diisi',
                        'is_unique' => 'Tingka Kesulitan sudah ada',
                    ],
                ],
                'skore' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Skore harus diisi'
                    ],
                ],
            ]
        )) {
            return redirect()->to('/admin/add_kesulitan')->withInput();
        }
        $this->kesulitanModel->save([
            'id' => $id,
            'kesulitan' => $kesulitan,
            'skore' => $request->getVar('skore'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/admin/data_kesulitan');
    }

    public function delete($id)
    {
        $this->kesulitanModel->delete($id);
        session()->getFlashdata('pesan', 'data berhasil dihapus');
        return redirect()->to('/admin/data_kesulitan');
    }
}
