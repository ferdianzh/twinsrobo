<?php

namespace App\Controllers;

class UsrView extends BaseController
{
   public function index()
   {
      echo view('user/index');
   }
   public function lomba()
   {
      echo view('user/infolomba');
   }
   public function price()
   {
      echo view('user/pricelist');
   }
   public function login()
   {
      echo view('user/login');
   }
}