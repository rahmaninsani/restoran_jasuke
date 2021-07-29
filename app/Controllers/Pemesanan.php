<?php 

namespace App\Controllers;

use App\Models\PemesananModel;

class Pemesanan extends BaseController {

  protected $pemesananModel;

  public function __construct()
  {
    $this->pemesananModel = new PemesananModel();
  }

  public function index()
  {
    $pemesanan = $this->pemesananModel->findAll();
    $data = [
      'title' => 'Pemesanan',
      'pemesanan' => $pemesanan
    ];

    return view('pemesanan/index', $data);
  }

}
