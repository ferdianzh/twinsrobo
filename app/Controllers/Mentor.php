<?php

namespace App\Controllers;

class Mentor extends BaseController
{
    public function view()
    {
        $data = [
            'title' => 'Mentor'
        ];
        return view('admin/mentor/data_mentor', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Mentor'
        ];
        return view('admin/mentor/add_mentor', $data);
    }
}
