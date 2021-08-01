<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    // Jika user belum login
    if(! session()->get('nrp')){
      // Maka redirect ke halaman login
      session()->setFlashdata('pesan', 'Silakan login terlebih dahulu.');
      return redirect()->to(base_url('/login')); 
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do something here
  }
}