<?php

namespace App\Controllers\Api;

class MidtransCSRest extends MidtransCounterStore
{
   public function charge()
   {
      $charge = parent::charge();

      header('Content-Type: application/json');
      return $this->response->setJSON($charge);
   }

   public function status($orderId){
      $status = parent::status($orderId);
      
      header('Content-Type: application/json');
      return $this->response->setJSON($status);
   }
   
   public function cancel($orderId){
      $cancel = parent::cancel($orderId);
      
      header('Content-Type: application/json');
      return $this->response->setJSON($cancel);
   }
}