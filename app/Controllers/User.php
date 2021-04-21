<?php

namespace App\Controllers;

class User extends BaseController
{
    public function view()
    {
        $data = [
            'title' => 'User'
        ];
        return view('admin/users/data_users', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'User'
        ];
        return view('admin/users/add_users', $data);
    }
}
