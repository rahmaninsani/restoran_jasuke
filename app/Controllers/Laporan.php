<?php

namespace App\Controllers;

use App\Models\PemesananModel;
use App\Models\PembayaranModel;

class Laporan extends BaseController
{
  protected
    $pemesananModel,
    $pembayaranModel;

  public function __construct()
  {
    $this->pemesananModel = new PemesananModel();
    $this->pembayaranModel = new PembayaranModel();
  }

  public function index()
  {
    $pemesanan = $this->pemesananModel->getPemesanan();
    $pembayaran = $this->pembayaranModel->getPembayaran();
    $data = [
      'title' => 'Pelaporan',
      'pemesanan' => $pemesanan,
      'pembayaran' => $pembayaran,
    ];

    return view('laporan/index', $data);
  }
}
