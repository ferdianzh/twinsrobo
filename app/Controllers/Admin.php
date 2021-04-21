<?php

namespace App\Controllers;

class Admin extends BaseController
{
	public function index()
	{
		return view('admin/profile/v_profile');
	}

	public function view()
	{
		$data = [
			'title' => 'Admin'
		];
		return view('admin/profile/data_admin', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Admin'
		];
		return view('admin/profile/add_admin', $data);
	}
}
