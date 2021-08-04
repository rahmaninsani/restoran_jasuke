<?php

namespace App\Controllers;

use App\Models\PemesananModel;

class Pemesanan extends BaseController
{
  protected
    $pemesananModel;

  public function __construct()
  {
    $this->pemesananModel = new PemesananModel();
  }

  public function index()
  {
    $pemesanan = $this->pemesananModel->getPemesanan();
    $data = [
      'title' => 'Pemesanan',
      'pemesanan' => $pemesanan,
    ];

    return view('pemesanan/v_pemesanan', $data);
  }

  public function tambah_pemesanan()
  {
    $data = [
      'title' => 'Tambah Pemesanan',
    ];

    return view('pemesanan/v_tambah_pemesanan', $data);
  }

}
