<?php

namespace App\Controllers;

use App\Models\PembayaranModel;
use App\Models\DetailPemesananModel;
use App\Models\MejaModel;

class Pembayaran extends BaseController
{
  protected
    $pembayaranModel,
    $detailPemesananModel,
    $mejaModel;

  public function __construct()
  {
    $this->detailPemesananModel = new DetailPemesananModel();
    $this->pembayaranModel = new PembayaranModel();
    $this->mejaModel = new MejaModel();
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

  public function detail_pembayaran($no_pembayaran)
  {
    $detailPemesanan = $this->detailPemesananModel->getDetailPembayaran($no_pembayaran);
    
    $data = [
      'title'=> 'Detail Pembayaran',
      'detailPemesanan'=> $detailPemesanan,
    ];

    if(empty($data['detailPemesanan'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException("No pembayaran $no_pembayaran tidak ditemukan.");
    }
    return view('pembayaran/v_detail_pembayaran', $data);

  }

  public function bayar($no_pembayaran, $no_meja)
  {
    if(! is_kasir()) 
    {
      return redirect()->to(base_url(previous_url()));
    }

    if(!$this->validate([
			'uangBayar' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nominal pembayaran harus diisi!'
        ],
      ],	 		
    ])) 
    {
			return redirect()->to(base_url("/pembayaran/$no_pembayaran"))->withInput();
		};

    // Inisialisasi field
    $uang_bayar = $this->request->getVar('uangBayar');

    // Ambil total_bayar
    $total_bayar = $this->pembayaranModel->getTotalBayar($no_pembayaran);

    // Hitung kembalian
    $uang_kembalian = $uang_bayar - $total_bayar;

    // Update pembayaran
    $this->pembayaranModel->updateBayar($no_pembayaran, $uang_bayar, $uang_kembalian, "Sudah Bayar");

    // Update meja baru menjadi 'Kosong'
    $this->mejaModel->updateStatusMeja($no_meja, "Kosong");
    
    session()->setFlashdata('pesan', 'Melakukan pembayaran');

    return redirect()->to(base_url("/pembayaran/$no_pembayaran"));

  }

  public function ubah_status($no_pembayaran)
  {
    // Update pembayaran
    $this->pembayaranModel->ubahStatusBayar($no_pembayaran);
    
    session()->setFlashdata('pesan', 'Mengubah status pembayaran');

    return redirect()->to(base_url("/pembayaran/$no_pembayaran"));
  }

}
