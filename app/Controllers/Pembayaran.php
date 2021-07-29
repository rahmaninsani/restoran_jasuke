<?php

namespace App\Controllers;

use App\Models\PembayaranModel;

class Pembayaran extends BaseController
{
  protected $pembayaranModel;

  public function __construct()
  {
    $this->pembayaranModel = new PembayaranModel();
  }

  public function index()
  {
    $pembayaran = $this->pembayaranModel->findAll();

    $data = [
      'title' => 'Pembayaran',
      'pembayaran' => $pembayaran
    ];

    return view('pembayaran/index', $data);
  }
}
