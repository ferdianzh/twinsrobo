<?php

namespace App\Controllers\Api;

use Midtrans\CoreApi;
use Midtrans\Transaction;

class MidtransVirtualAccount extends MidtransController
{
   public function charge()
   {
      $items = array(
         array(
            'id'       => 'modul1',
            'price'    => 100000,
            'quantity' => 1,
            'name'     => 'Modul Robot Dasar'
         ),
      );
      $customer_details = array(
         'first_name'       => "Muhammad",
         'last_name'        => "Hafizh",
         'email'            => "mhafizh@gmail.com",
         'phone'            => "081234567890",
      );
      
      $transaction_details = $this->setTransactionDetails('va', 100000);
      // get transaction id and save to database

      $transaction_data = array(
         'payment_type'          => 'bank_transfer',
         'transaction_details'   => $transaction_details,
         'item_details'          => $items,
         'customer_details'      => $customer_details,
         'custom_expiry'         => $this->getCustomExpiry(),
      );

      try {
         $response = CoreApi::charge($transaction_data);
         header('Content-Type: application/json');
         var_dump($response);
      } catch (\Exception $e) {
         echo $e->getMessage();
      }
   }

   public function status()
   {
      $orderId = 'va-1635231870';

      try {
         $status = Transaction::status($orderId);
         var_dump($status);
      } catch (\Exception $e) {
         echo $e->getMessage();
         die();
      }
   }

   public function cancel()
   {
      $orderId = 'va-1635231870';

      try {
         $cancel = Transaction::cancel($orderId);
         var_dump($cancel);
      } catch (\Exception $e) {
         echo $e->getMessage();
         die();
      }
   }
   
}