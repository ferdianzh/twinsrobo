<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthUser implements FilterInterface
{
   public function before(RequestInterface $request, $arguments = null)
   {
      helper('url');
      $currentUrl = current_url();
      if ( !str_contains($currentUrl, 'login') ) {
         if ( !session()->get('logged_in') ) {
            return redirect()->to('/login');
         }
      }
   }

   public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
   {
      // Do something here
   }
}