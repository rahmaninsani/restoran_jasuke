<?php

namespace App\Controllers;

class Pembayaran extends BaseController
{
  public function index()
  {
    $data = [
      'title' => 'Pembayaran',
    ];

    return view('pembayaran/index', $data);
  }
}
