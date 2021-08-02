<?php 

namespace App\Controllers;

use App\Models\MejaModel;
use App\Models\MenuModel;
use App\Models\PembayaranModel;

class Beranda extends BaseController {
  protected 
    $mejaModel,
    $menuModel,
    $pembayaranModel;

  public function __construct()
  {
    $this->mejaModel = new MejaModel();
    $this->menuModel = new MenuModel();
    $this->pembayaranModel = new PembayaranModel();
  }

  public function index()
  {
    $mejaKosong = $this->mejaModel->getStatusMeja('Kosong');
    $mejaTerisi = $this->mejaModel->getStatusMeja('Terisi');
    $menuTersedia = $this->menuModel->getJumlahMenu();
    $pemasukanHarian = $this->pembayaranModel->getPemasukanHarian();
    $pemasukanHarian = number_format($pemasukanHarian, 2, ',', '.');
    
    $data = [
      'title' => 'Beranda',
      'mejaKosong' => $mejaKosong,
      'mejaTerisi' => $mejaTerisi,
      'menuTersedia' => $menuTersedia,
      'pemasukanHarian' => $pemasukanHarian, 
    ];


    return view('beranda/v_beranda', $data);
  }

}


?>