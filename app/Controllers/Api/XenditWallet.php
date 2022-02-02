<?php

namespace App\Controllers\Api;

use App\Controllers\Api\XenditController;
use DateTime;
use Xendit\Xendit;

class XenditWallet extends XenditController
{
	public function charge()
   {
      $params = [
         'reference_id' => 'test-reference-id',
         'currency' => 'IDR',
         'amount' => 1000,
         'checkout_method' => 'ONE_TIME_PAYMENT',
         'channel_code' => 'ID_SHOPEEPAY',
         'channel_properties' => [
             'success_redirect_url' => 'https://dashboard.xendit.co/register/1',
         ],
         'metadata' => [
             'branch_code' => 'tree_branch'
         ]
     ];
     
     $createEWalletCharge = \Xendit\EWallets::createEWalletCharge($params);
     return $createEWalletCharge;
   }

   public function callback()
   {
      $request = \Config\Services::request();

      $data = [
         'id' => $request->getVar('id'),
         'ref_id' => $request->getVar('reference_id'),
         'status' => $request->getVar('status'),
         'capture_amount' => $request->getVar('capture_amount'),
         'channel_code' => $request->getVar('channel_code'),
      ];

		$pembelian = $this->pembelianModel->where(['xendit_id' => $data['ref_id']]);
		
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

   public function check()
   {
      $charge_id = 'ewc_142b598e-72e3-4e41-b0cc-38b6c00f8d0d';
      $getEWalletChargeStatus = \Xendit\EWallets::getEWalletChargeStatus($charge_id);
      var_dump($getEWalletChargeStatus);
   }
}
