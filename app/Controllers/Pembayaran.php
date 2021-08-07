<?php

namespace App\Controllers;

use App\Models\PemesananModel;
use App\Models\DetailPemesananModel;
use App\Models\PembayaranModel;
use App\Models\MejaModel;
use App\Models\MenuModel;

class Pembayaran extends BaseController
{
  protected
    $pemesananModel,
    $detailPemesananModel,
    $pembayaranModel,
    $mejaModel,
    $menuModel;

  public function __construct()
  {
    $this->pemesananModel = new PemesananModel();
    $this->detailPemesananModel = new DetailPemesananModel();
    $this->pembayaranModel = new PembayaranModel();
    $this->mejaModel = new MejaModel();
    $this->menuModel = new MenuModel();
  }

  public function index()
  {
    if(! is_kasir()) 
    {
      return redirect()->to(base_url(previous_url()));
    }

    $pembayaran = $this->pembayaranModel->getPembayaran();

    $data = [
      'title' => 'Pembayaran',
      'pembayaran' => $pembayaran,
    ];

    return view('pembayaran/v_pembayaran', $data);
  }
}
