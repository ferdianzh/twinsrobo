<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController
{
	protected $adminModel;
	public function __construct()
	{
		$this->adminModel = new AdminModel();
	}

	public function index()
	{
		$data = [
			'id' => session()->get('id'),
			'nama' => session()->get('nama'),
			'email' => session()->get('email'),
			'tipe_admin' => session()->get('tipe_admin'),
			'password' => session()->get('password'),
			'foto' => session()->get('foto'),
		];
		return view('admin/profile/v_profile', $data);
	}

	public function view()
	{
		$admin = $this->adminModel->orderBy('id', 'desc')->findAll();
		$data = [
			'title' => 'Admin',
			'admin' => $admin
		];
		return view('admin/profile/data_admin', $data);
	}

	public function add()
	{
		$super = false;
		if ( session()->get('tipe_admin') == 'Super Admin' ) $super = true;
		if ( $this->checkAuth($super) ) {
			return redirect()->to('/admin/data_admin');
		}

		$data = [
			'title' => 'Admin',
			'validation' => \Config\Services::validation()
		];
		return view('admin/profile/add_admin', $data);
	}

	public function edit($id)
	{
		if( $this->checkAuth($id) ) {
			return redirect()->to('/admin/data_admin');
		}

		$admin = $this->adminModel->where(['id' => $id])->first();
		$data = [
			'title' => 'Admin',
			'admin' => $admin,
			'validation' => \Config\Services::validation()
		];
		return view('admin/profile/update_admin', $data);
	}

	public function editProfile($id)
	{
		$admin = $this->adminModel->where(['id' => $id])->first();
		$data = [
			'title' => 'Admin',
			'admin' => $admin,
			'validation' => \Config\Services::validation()
		];
		return view('admin/profile/update_profile', $data);
	}

	public function save()
	{
		$request = \Config\Services::request();
		if (!$this->validate(
			[
				'nama' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'Nama harus diisi'
					],
				],
				'email' => [
					'rules' => 'required|is_unique[admin.email]',
					'errors' => [
						'required' => 'Email harus diisi',
						'is_unique' => 'Email sudah digunakan'
					]
				],
				'password' => [
					'rules' => 'required|min_length[8]',
					'errors' => [
						'required' => 'Password harus diisi',
						'min_length' => 'Password harus berisi minimal 8 karakter'
					]
				],
				'tipe_admin' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'Tipe Admin harus diisi'
					]
				],
				'foto' => [
					'rules' => 'max_size[foto, 5024]|is_image[foto]|mime_in[foto,image/jpg,image/JPG,image/jpeg,image/JPEG,image/png]',
					'errors' => [
						'max_size' => 'Ukuran gambar terlalu besar',
						'is_image' => 'File yang dipilih bukan gambar',
						'mime_in' => 'File yang dipilih bukan gambar'

					]
				]
			]
		)) {

			return redirect()->to('/admin/add_admin')->withInput();
		}

		$fotoProfile = $request->getFile('foto');

		if ($fotoProfile->getError() == 4) {
			$fotoName = 'customer-service.png';
		} else {
			$fotoName = $fotoProfile->getRandomName();
			$fotoProfile->move('img/admin', $fotoName);
		}
		// $newName = $fotoProfile->getRandomName();
		$password = $request->getVar('password');

		$this->adminModel->save([
			'nama' => $request->getVar('nama'),
			'email' => $request->getVar('email'),
			'password' => md5($password),
			'tipe_admin' => $request->getVar('tipe_admin'),
			'foto' => $fotoName
		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

		return redirect()->to('/admin/data_admin');
	}

	public function update($id)
	{
		$request = \Config\Services::request();
		$password = $request->getVar('password');
		$email = $request->getVar('email');
		$emailLama = $request->getVar('emailLama');
		if ($password == null) {
			$rules = 'min_length[0]';
			$dataPassword = $request->getVar('passwordLama');
		} else {
			$rules = 'min_length[8]|matches[repassword]';
			$dataPassword = md5($password);
		}
		if ($email == $emailLama) {
			$rulesEmail = 'required';
			$dataEmail = $emailLama;
		} else {
			$rulesEmail = 'required|is_unique[admin.email]';
			$dataEmail = $email;
		}
		if (!$this->validate(
			[
				'nama' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'Nama harus diisi'
					],
				],
				'email' => [
					'rules' => $rulesEmail,
					'errors' => [
						'required' => 'Email harus diisi',
						'is_unique' => 'Email sudah digunakan'
					]
				],
				'password' => [
					'rules' => $rules,
					'errors' => [
						'required' => 'Password harus diisi',
						'min_length' => 'Password harus berisi minimal 8 karakter',
						'matches' => 'Password yang anda ketikkan tidak sama'
					]
				],
				'tipe_admin' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'Tipe Admin harus diisi'
					]
				],
				'foto' => [
					'rules' => 'max_size[foto, 5024]|is_image[foto]|mime_in[foto,image/jpg,image/JPG,image/jpeg,image/JPEG,image/png]',
					'errors' => [
						'max_size' => 'Ukuran gambar terlalu besar',
						'is_image' => 'File yang dipilih bukan gambar',
						'mime_in' => 'File yang dipilih bukan gambar'

					]
				]
			]
		)) {

			return redirect()->to('/admin/update_admin/' . $id)->withInput();
		}

		$fotoProfile = $request->getFile('foto');
		$fotoLama = $request->getVar('fotoLama');

		if ($fotoProfile->getError() == 4) {
			$fotoName = $fotoLama;
		} else {
			$fotoName = $fotoProfile->getRandomName();
			$fotoProfile->move('img/admin', $fotoName);
			if ($fotoLama != 'customer-service.png') {
				unlink('img/admin/' . $request->getVar('fotoLama'));
			}
		}
		// $newName = $fotoProfile->getRandomName();
		$password = $request->getVar('password');

		$newData = [
			'id' => $id,
			'nama' => $request->getVar('nama'),
			'email' => $dataEmail,
			'password' => $dataPassword,
			'tipe_admin' => $request->getVar('tipe_admin'),
			'foto' => $fotoName
		];

		$this->adminModel->save($newData);

		if ( $id == session()->get('id') ) {
		  session()->set($newData);
		}

		session()->setFlashdata('pesan', 'Data berhasil diubah.');

		return redirect()->to('/admin/data_admin');
	}

	public function delete($id)
	{
		$admin = $this->adminModel->find($id);
		if ($admin['foto'] != 'customer-service.png') {
			unlink('img/admin/' . $admin['foto']);
		}
		$this->adminModel->delete($id);
		session()->setFlashdata('pesan', 'data berhasil dihapus');
		return redirect()->to('/admin/data_admin');
	}

	private function checkAuth($id)
	{
		if ( session()->get('tipe_admin') != "Super Admin" ) {
			if ( $id != session()->get('id') || $id != true ) {
				session()->setFlashdata('pesan', 'Hanya <b>Super Admin</b> yang dapat melakukan perubahan data admin');
				return 1;
			}
		}
	}
}