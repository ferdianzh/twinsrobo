<?php

namespace App\Controllers;

class Blog extends BaseController
{
    public function view()
    {
        $data = [
            'title' => 'Blog'
        ];
        return view('admin/blog/data_blog', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Blog'
        ];
        return view('admin/blog/add_blog', $data);
    }
    public function blog()
    {
        return view('/user/blog');
    }
}
