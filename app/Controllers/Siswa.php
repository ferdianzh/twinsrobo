<?php

namespace App\Controllers;

class Siswa extends BaseController
{
    public function view()
    {
        $data = [
            'title' => 'Siswa'
        ];
        return view('admin/siswa/data_siswa', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Siswa'
        ];
        return view('admin/siswa/add_siswa', $data);
    }
}
