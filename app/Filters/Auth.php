<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
   public function before(RequestInterface $request, $arguments = null)
   {
      $session = session()->get();
      
      helper('url');
      $currentUrl = current_url();

      if (!str_contains($currentUrl, 'login')) {
         // prevent access admin page when user not logged in
         if (!isset($session['tipe_admin'])) {
            return redirect()->to('/admin/login');
         }
      } else {
         // prevent access login page because user already logged in
         if (isset($session['tipe_admin'])) {
            return redirect()->to('/admin/');
         }
      }
   }

   public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
   {
      // Do something here
   }
}