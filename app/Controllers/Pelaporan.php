<?php 

namespace App\Controllers;

use App\Models\PembayaranModel;
use App\Models\DetailPemesananModel;

class Pelaporan extends BaseController {

  protected
    $pembayaranModel,
    $detailPemesananModel,
    $mejaModel;

  public function __construct()
  {
    $this->pembayaranModel = new PembayaranModel();
    $this->detailPemesananModel = new DetailPemesananModel();
  }

  public function index()
  {
    if(! is_kasir()) 
    {
      return redirect()->to(base_url(previous_url()));
    }
    
    $pelaporanHarian = $this->detailPemesananModel->getLaporanHarian();
    $kuantitasTerjualHarian = $this->detailPemesananModel->getKuantitasTerjualHarian();
    $pemasukanHarian = $this->pembayaranModel->getPemasukanHarian();
    
    $pelaporanMingguan = $this->detailPemesananModel->getLaporanMingguan();
    $kuantitasTerjualMingguan = $this->detailPemesananModel->getKuantitasTerjualMingguan();
    $pemasukanMingguan = $this->pembayaranModel->getPemasukanMingguan();

    $pelaporanBulanan = $this->detailPemesananModel->getLaporanBulanan();
    $kuantitasTerjualBulanan = $this->detailPemesananModel->getKuantitasTerjualBulanan();
    $pemasukanBulanan = $this->pembayaranModel->getPemasukanBulanan();

    $pelaporanTahunan = $this->detailPemesananModel->getLaporanTahunan();
    $kuantitasTerjualTahunan = $this->detailPemesananModel->getKuantitasTerjualTahunan();
    $pemasukanTahunan = $this->pembayaranModel->getPemasukanTahunan();
    
    $data = [
      'title' => 'Pelaporan',
      'pelaporanHarian' => $pelaporanHarian,
      'kuantitasTerjualHarian' => $kuantitasTerjualHarian,
      'pemasukanHarian' => $pemasukanHarian,
      'pelaporanMingguan' => $pelaporanMingguan,
      'kuantitasTerjualMingguan' => $kuantitasTerjualMingguan,
      'pemasukanMingguan' => $pemasukanMingguan,
      'pelaporanBulanan' => $pelaporanBulanan,
      'kuantitasTerjualBulanan' => $kuantitasTerjualBulanan,
      'pemasukanBulanan' => $pemasukanBulanan,
      'pelaporanTahunan' => $pelaporanTahunan,
      'kuantitasTerjualTahunan' => $kuantitasTerjualTahunan,
      'pemasukanTahunan' => $pemasukanTahunan,
    ];

    return view('pelaporan/v_pelaporan', $data);
  }

}
