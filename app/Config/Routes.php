<?php

namespace Config;

use App\Controllers\UsrView;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->group('admin', ['filter' => 'auth'], function($routes) {
	// Upload file todo-list

	//Admin
	$routes->get('', 'Admin::index');
	$routes->get('data_admin', 'Admin::view');
	$routes->get('add_admin', 'Admin::add');
	$routes->get('update_admin/(:num)', 'Admin::edit/$1');
	// $routes->get('/admin/update_profile/(:num)', 'Admin::editProfile/$1');
	$routes->delete('delete_admin/(:num)', 'Admin::delete/$1');

	//User
	$routes->get('data_users', 'User::view');
	$routes->get('add_users', 'User::add');
	$routes->get('update_users/(:num)', 'User::edit/$1');
	$routes->delete('delete_user/(:num)', 'User::delete/$1');

	//Modul
	$routes->get('data_modul', 'Modul::view');
	$routes->get('add_modul', 'Modul::add');
	$routes->get('update_modul/(:num)', 'Modul::edit/$1');
	$routes->delete('delete_modul/(:num)', 'Modul::delete/$1');

	//Materi
	$routes->get('data_materi', 'Materi::view');
	$routes->get('add_materi', 'Materi::add');
	$routes->get('update_materi/(:num)', 'Materi::edit/$1');
	$routes->delete('delete_materi/(:num)', 'Materi::delete/$1');

	//Atm
	$routes->get('data_atm', 'Atm::view');
	$routes->get('add_atm', 'Atm::add');
	$routes->get('update_atm/(:num)', 'Atm::edit/$1');
	$routes->delete('delete_atm/(:num)', 'Atm::delete/$1');

	//Pembelian
	$routes->get('data_pembelian', 'Pembelian::view');
	$routes->get('add_pembelian', 'Pembelian::add');
	// $routes->get('/update_materi/(:num)', 'Atm::edit/$1');
	$routes->delete('delete_pembelian/(:num)', 'Pembelian::delete/$1');

	//Tips
	$routes->get('data_tips', 'Tips::view');
	$routes->get('add_tips', 'Tips::add');
	$routes->get('update_tips/(:num)', 'Tips::edit/$1');
	$routes->delete('delete_tips/(:num)', 'Tips::delete/$1');

	//Gambar Tips
	$routes->get('data_gambar_tips', 'GambarTips::view');
	$routes->get('add_gambar_tips', 'GambarTips::add');
	$routes->get('update_gambar_tips/(:num)', 'GambarTips::edit/$1');
	$routes->delete('delete_gambartips/(:num)', 'GambarTips::delete/$1');

	//Video Tips
	$routes->get('data_video_tips', 'VideoTips::view');
	$routes->get('add_video_tips', 'VideoTips::add');
	$routes->get('update_video_tips/(:num)', 'VideoTips::edit/$1');
	$routes->delete('delete_videotips/(:num)', 'VideoTips::delete/$1');

	//Gambar Materi
	$routes->get('data_gambar_materi', 'GambarMateri::view');
	$routes->get('add_gambar_materi', 'GambarMateri::add');
	$routes->get('update_gambar_materi/(:num)', 'GambarMateri::edit/$1');
	$routes->delete('delete_gambarmateri/(:num)', 'GambarMateri::delete/$1');

	//Video Materi
	$routes->get('data_video_materi', 'VideoMateri::view');
	$routes->get('add_video_materi', 'VideoMateri::add');
	$routes->get('update_video_materi/(:num)', 'VideoMateri::edit/$1');
	$routes->delete('delete_videomateri/(:num)', 'VideoMateri::delete/$1');

	//Kesulitan
	$routes->get('data_kesulitan', 'Kesulitan::view');
	$routes->get('add_kesulitan', 'Kesulitan::add');
	$routes->get('update_kesulitan/(:num)', 'Kesulitan::edit/$1');
	$routes->delete('delete_kesulitan/(:num)', 'Kesulitan::delete/$1');

	//Kategori
	$routes->get('data_kategori', 'Kategori::view');
	$routes->get('add_kategori', 'Kategori::add');
	$routes->get('update_kategori/(:num)', 'Kategori::edit/$1');
	$routes->delete('delete_kategori/(:num)', 'Kategori::delete/$1');

	//Kelas
	$routes->get('data_kelas', 'Kelas::view');
	$routes->get('add_kelas', 'Kelas::add');
	$routes->get('update_kelas/(:num)', 'Kelas::edit/$1');
	$routes->delete('delete_kelas/(:num)', 'Kelas::delete/$1');

	//Karir
	$routes->get('data_karir', 'Karir::view');
	$routes->get('add_karir', 'Karir::add');

	//Mentor
	$routes->get('data_mentor', 'Mentor::view');
	$routes->get('add_mentor', 'Mentor::add');
	$routes->get('update_mentor/(:num)', 'Mentor::edit/$1');
	$routes->delete('delete_mentor/(:num)', 'Mentor::delete/$1');

	//Blog
	$routes->get('data_blog', 'Blog::view');
	$routes->get('add_blog', 'Blog::add');

	//Siswa
	$routes->get('data_siswa', 'Siswa::view');
	$routes->get('add_siswa', 'Siswa::add');
	$routes->get('update_siswa/(:num)', 'Siswa::edit/$1');
	$routes->delete('delete_siswa/(:num)', 'Siswa::delete/$1');

	//Login
	$routes->get('login', 'Login::index');
});

//Users
$routes->get('/blog', 'Blog::blog');
$routes->get('/login', 'UsrLogin::login');
$routes->get('/logout', 'UsrLogin::logout');
$routes->get('/registration', 'UsrRegister::registration');
$routes->get('/', 'UsrView::index');
$routes->get('/pricelist', 'UsrView::price');
$routes->get('/lomba', 'UsrView::lomba');
$routes->get('/flash', 'IqbalPunya::flash');

// User Dashboard (logged in)
$routes->get('/progressbelajar', 'ProgressBelajar::home', ['filter' => 'authuser']);
$routes->get('/kelas_saya', 'UsrViewLogin::kelasSaya', ['filter' => 'authuser']);
// $routes->get('/kelaslist/(:any)/(:any)', 'UsrViewLogin::showKelasList/$1/$2');

// Xendit Payment
$routes->group('xendit', function($routes) {
	$routes->group('va', function($routes) {
		$routes->get('list', 'Api\XenditVirtualAccount::getListVA');
		$routes->post('create', 'Api\XenditVirtualAccount::createVA');
		$routes->post('callback', 'Api\XenditVirtualAccount::callBackVA');
	});
	$routes->group('wallet', function($routes) {
		$routes->post('charge', 'Api\XenditWallet::charge');
		$routes->get('callback', 'Api\XenditWallet::callback');
		$routes->get('check', 'Api\XenditWallet::check');
	});
});
$routes->group('midtrans', function($routes) {
	$routes->group('va', function($routes) {
		$routes->get('charge', 'Api\MidtransVirtualAccount::charge');
		$routes->get('status', 'Api\MidtransVirtualAccount::status');
		$routes->get('cancel', 'Api\MidtransVirtualAccount::cancel');
	});
	$routes->group('cs', function($routes) {
		$routes->post('charge', 'Api\MidtransCSRest::charge');
		$routes->get('status/(:any)', 'Api\MidtransCSRest::status/$1');
		$routes->get('cancel/(:any)', 'Api\MidtransCounterStore::cancel/$1');
	});
});

// User
// $routes->get('/rest_users', 'User::restGetAll');
// $routes->get('/rest_users/(:num)', 'User::restGet/$1');
// $routes->post('/rest_createuser', 'User::restCreate');
// $routes->put('/rest_updateuser/(:num)', 'User::restUpdate/$1');
// $routes->get('/rest_deleteuser/(:num)', 'User::restDelete/$1');
// // Mentor
// $routes->get('/rest_mentor', 'Mentor::restGetAll');
// $routes->get('/rest_mentor/(:num)', 'Mentor::restGet/$1');
// // Kelas
// $routes->get('/rest_kelas', 'Kelas::restGetAll');
// $routes->get('/rest_kelas/(:num)', 'Kelas::restGet/$1');
// // Modul
// $routes->get('/rest_modul', 'Modul::restGetAll');
// $routes->get('/rest_modul/(:num)', 'Modul::restGet/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
