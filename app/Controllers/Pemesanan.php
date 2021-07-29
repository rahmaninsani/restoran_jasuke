<?php

namespace App\Controllers;

class Pemesanan extends BaseController
{
  public function index()
  {
    $data = [
      'title' => 'Pemesanan',
    ];

    return view('pemesanan/index', $data);
  }
}
