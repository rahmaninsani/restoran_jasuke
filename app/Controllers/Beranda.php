<?php 

namespace App\Controllers;

use App\Models\MejaModel;
use App\Models\PemesananModel;
use App\Models\MenuModel;
use App\Models\PembayaranModel;
use App\Models\DetailPemesananModel;

class Beranda extends BaseController {
  protected 
    $mejaModel,
    $pemesananModel,
    $menuModel,
    $pembayaranModel,
    $detailPemesananModel;

  public function __construct()
  {
    $this->mejaModel = new MejaModel();
    $this->pemesananModel = new PemesananModel();
    $this->menuModel = new MenuModel();
    $this->pembayaranModel = new PembayaranModel();
    $this->detailPemesananModel = new DetailPemesananModel();
  }

  public function index()
  {
    $mejaKosong = $this->mejaModel->getStatusMeja('Kosong');
    $jumlahPemesanan = $this->pemesananModel->getJumlahPemesanan('Belum Selesai');
    $jumlahBelumBayar = $this->pembayaranModel->getJumlahPembayaran('Belum Bayar');
    $menuTersedia = $this->menuModel->getJumlahMenu();
    $pemasukanHarian = $this->pembayaranModel->getPemasukanHarian();
    $pemasukanHarian = number_format($pemasukanHarian, 2, ',', '.');

    $menuTerlaris = $this->detailPemesananModel->getMenuTerlaris();
    $menuTerbaru = $this->menuModel->getMenuTerbaru();
    
    $data = [
      'title' => 'Beranda',
      'mejaKosong' => $mejaKosong,
      'jumlahPemesanan' => $jumlahPemesanan,
      'jumlahBelumBayar' => $jumlahBelumBayar,
      'menuTersedia' => $menuTersedia,
      'pemasukanHarian' => $pemasukanHarian, 
      'menuTerlaris' => $menuTerlaris,
      'menuTerbaru' => $menuTerbaru,
    ];


    return view('beranda/v_beranda', $data);
  }

}


?>