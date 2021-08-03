<?php 

namespace App\Controllers;

use App\Models\MejaModel;
use App\Models\MenuModel;
use App\Models\PembayaranModel;
use App\Models\DetailPemesananModel;

class Beranda extends BaseController {
  protected 
    $mejaModel,
    $menuModel,
    $pembayaranModel,
    $detailPemesananModel;

  public function __construct()
  {
    $this->mejaModel = new MejaModel();
    $this->menuModel = new MenuModel();
    $this->pembayaranModel = new PembayaranModel();
    $this->detailPemesananModel = new DetailPemesananModel();
  }

  public function index()
  {
    $mejaKosong = $this->mejaModel->getStatusMeja('Kosong');
    $mejaTerisi = $this->mejaModel->getStatusMeja('Terisi');
    $menuTersedia = $this->menuModel->getJumlahMenu();
    $pemasukanHarian = $this->pembayaranModel->getPemasukanHarian();
    $pemasukanHarian = number_format($pemasukanHarian, 2, ',', '.');

    $menuTerlaris = $this->detailPemesananModel->getMenuTerlaris();
    $menuTerbaru = $this->menuModel->getMenuTerbaru();
    
    $data = [
      'title' => 'Beranda',
      'mejaKosong' => $mejaKosong,
      'mejaTerisi' => $mejaTerisi,
      'menuTersedia' => $menuTersedia,
      'pemasukanHarian' => $pemasukanHarian, 
      'menuTerlaris' => $menuTerlaris,
      'menuTerbaru' => $menuTerbaru,
    ];


    return view('beranda/v_beranda', $data);
  }

}


?>