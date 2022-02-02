<?php

namespace App\Controllers\Api;

use App\Controllers\Api\XenditController;
use DateTime;

class XenditVirtualAccount extends XenditController
{
	public function getListVA()
	{
		// list bank yang tersedia
		$getVABanks = \Xendit\VirtualAccounts::getVABanks();
		$activeVA = [];

		foreach ( $getVABanks as $bank ) {
			if ( $bank['is_activated'] ) {
				array_push($activeVA, $bank);
			}
		}

		var_dump($activeVA);
		// return $this->response->setJSON($activeVA)->setStatusCode(200);
	}

	public function createVA( $data = [] )
	{	
		// menambahkan pembayaran melalui bank
		// $request = service('request');

		// $external_id = 'va-'.time();
		$dt = new DateTime('now');
		$expiration = $dt->modify('+100 year')->format('c');

		$params = [
			"external_id" => $data['external_id'],
			"bank_code" => $data['bank_code'],
			"name" => $data['name'],
			"expected_amount" => $data['amount'],
			"is_closed" => true,
			"expiration_date" => $expiration,
			"is_single_use" => true
		];

		$createVA = \Xendit\VirtualAccounts::create($params);
		// return $this->response->setJSON(['data' => $createVA])->setStatusCode(200);
		return $createVA;
	}

	public function callBackVA()
	{
		$request = \Config\Services::request();

		$externalId = $request->getVar('exteral_id');
		$status = $request->getVar('exteral_id');
		$pembelian = $this->pembelianModel->where(['external_id' => $externalId]);
		
		if ( $pembelian->first() ) {
			$update = $pembelian->update(['status' => 1]);
			if ( $update > 0 ) {
				return 'Berhasil';
			}
			return 'Gagal';
		} else {
			$data = ['pesan', 'Data tidak ditemukan'];
			return $data;
		}
	}
}
