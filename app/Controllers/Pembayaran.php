<?php

namespace App\Controllers;

class Pembayaran extends BaseController
{
  public function index()
  {
    if(! is_kasir()) 
    {
      return redirect()->to(base_url(previous_url()));
    }

    $data = [
      'title' => 'Pembayaran',
    ];

    return view('pembayaran/index', $data);
  }
}
