<?php

namespace App\Controllers;

class Karir extends BaseController
{
    public function view()
    {
        $data = [
            'title' => 'Karir'
        ];
        return view('admin/karir/data_karir', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Karir'
        ];
        return view('admin/karir/add_karir', $data);
    }
}
