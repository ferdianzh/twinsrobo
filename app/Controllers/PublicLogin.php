<?php
namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

use App\Models\UserModel;

use function PHPUnit\Framework\isNull;

class PublicLogin extends BaseController
{
   use ResponseTrait;
   protected $userModel;

   public function __construct()
   {
      $this->userModel = new UserModel();
   }

   public function index()
   {
      if (!isNull($_POST)) {
         // check if true redirect to home
      } else {
         return view('user/login');
      }
   }

   public function home()
   {}
   
}