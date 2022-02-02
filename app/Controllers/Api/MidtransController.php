<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\ModulModel;
use App\Models\PembelianModel;
use App\Models\SiswaModel;
use App\Models\UserModel;
use Midtrans\Config;

class MidtransController extends BaseController
{
   protected $response;
   protected $userModel, $siswaModel, $modulModel, $pembelianModel;

   public function __construct()
   {
      Config::$serverKey = 'SB-Mid-server-ist1OS4Ak9hUhfxGj20ilpu1';
      Config::$clientKey = 'SB-Mid-client-mwugVIZKwRplJTZF';

      $this->response = service('response');
      $this->userModel = new UserModel();
      $this->siswaModel = new SiswaModel();
      $this->modulModel = new ModulModel();
      $this->pembelianModel = new PembelianModel();
   }

   protected function setTransactionDetails( $type, $id_siswa, $amount )
   {
      $transaction_details = array(
         'order_id'    => strtoupper($type) . '-' . $id_siswa . time(),
         'gross_amount'  => $amount,
      );
      return $transaction_details;
   }

   protected function getCustomerDetails($id)
   {
      $siswa = $this->siswaModel->where('siswa.id', $id)->select('siswa.id as id_siswa, id_user, nama_depan, nama_belakang, email, phone')->join('user', 'siswa.id_user = user.id')->first(); 

      $customer_details = array(
         'first_name'       => $siswa['nama_depan'],
         'last_name'        => $siswa['nama_belakang'],
         'email'            => $siswa['email'],
         'phone'            => $siswa['phone'],
      );

      return $customer_details;
   }

   protected function getItemDetails($id)
   {
      $modul = $this->modulModel->select('id, judul_modul, harga_modul')->whereIn('id', $id)->findAll();

      $items = array();
      $gross_amount = 0;
      foreach ( $modul as $mdl ) { 
         $item = array(
            'id'       => $mdl['id'],
            'price'    => intval($mdl['harga_modul']),
            'quantity' => 1,
            'name'     => $mdl['judul_modul']
         );
         array_push($items, $item);
         $gross_amount += intval($item['price']);
      }

      $data = [
         'items'        => $items,
         'gross_amount' => $gross_amount
      ];

      return $data;
   }

   protected function getCustomExpiry($days)
   {
      $custom_expiry = array(
         "order_time" => date("Y-m-d H:i:s O", time()),
         "expiry_duration" => $days*24*60,
         "unit" => "minute",
      );
      return $custom_expiry;
   }
}