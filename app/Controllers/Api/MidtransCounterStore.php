<?php

namespace App\Controllers\Api;

use Midtrans\CoreApi;
use Midtrans\Transaction;

class MidtransCounterStore extends MidtransController
{
   public function charge()
   {
      $request = \Config\Services::request();
      $pay_method = $request->getVar('metode');
      $id_modul = $request->getVar('id_modul');
      $id_siswa = $request->getVar('id_siswa');
      $exp_days = $request->getVar('exp_days');

      $items = $this->getItemDetails($id_modul);
      $customer_details = $this->getCustomerDetails($id_siswa);
      $transaction_details = $this->setTransactionDetails('cs', $id_siswa, $items['gross_amount']);
      $custom_expiry = $this->getCustomExpiry($exp_days);

      $cstore = array(
         "store" => $pay_method,
         "message" => "Pembayaran Modul1",
      );

      $transaction_data = array(
         'payment_type'          => 'cstore',
         'cstore'                => $cstore,
         'transaction_details'   => $transaction_details,
         'item_details'          => $items['items'],
         'customer_details'      => $customer_details,
         'custom_expiry'         => $custom_expiry,
      );

      try {
         $charge = CoreApi::charge($transaction_data);

         foreach ( $id_modul as $id_mdl ) {
            $this->pembelianModel->save([
                  'order_id' => $charge->order_id,
                  'id_siswa' => $id_siswa,
                  'id_modul' => $id_mdl,
                  'rekening_penerima' => 'Twinsrobo-Midtrans',
            ]);
         }

         return $charge;
      } catch (\Exception $e) {
         echo $e->getMessage();
         die();
      }
   }

   public function status($orderId)
   {
      try {
         $status = Transaction::status($orderId);
         return $status;
      } catch (\Exception $e) {
         echo $e->getMessage();
         die();
      }
   }

   public function cancel($orderId)
   {
      try {
         $cancel = Transaction::cancel($orderId);
         return $cancel;
      } catch (\Exception $e) {
         echo $e->getMessage();
         die();
      }
   }
}