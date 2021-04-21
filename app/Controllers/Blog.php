<?php

namespace App\Controllers;

class Blog extends BaseController
{
<<<<<<< HEAD
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
=======
	public function blog()
	{
		return view('/user/blog');
	}
>>>>>>> 620fe1de5487ddcae1531960622adc43ff8399d4
}
