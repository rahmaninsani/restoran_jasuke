<?php

namespace App\Controllers;

use App\Models\PemesananModel;
use App\Models\MejaModel;
use App\Models\MenuModel;

class Pemesanan extends BaseController
{
  protected
    $pemesananModel,
    $mejaModel,
    $menuModel;

  public function __construct()
  {
    $this->pemesananModel = new PemesananModel();
    $this->mejaModel = new MejaModel();
    $this->menuModel = new MenuModel();
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
    $mejaKosong = $this->mejaModel->getMejaKosong();
    $menuTersedia = $this->menuModel->getMenuTersedia();
    
    $data = [
      'title' => 'Tambah Pemesanan',
      'mejaKosong' => $mejaKosong,
      'menuTersedia' => $menuTersedia,
      'validation' => \Config\Services::validation(),
    ];

    return view('pemesanan/v_tambah_pemesanan', $data);
  }

  public function create()
	{ 
		if(!$this->validate([
			'tanggal' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tanggal penjualan harus diisi!'
        ],
      ],	 		
			'namaPelanggan' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nama pelanggan harus diisi!'
        ],
      ],
      'noMeja' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nomor meja harus diisi!'
        ],
      ],
      'menu' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Menu harus diisi!'
        ],
      ],	 		
			'kuantitas' => [
				'rules' => 'required|greater_than[0]',
				'errors' => [
					'required' => 'Kuantitas menu harus diisi!',
					'greater_than' => 'Jumlah kuantitas tidak boleh kurang dari 1!'
        ],
      ],	
		])) {
			return redirect()->to(base_url('/pemesanan/tambah_pemesanan'))->withInput();
		};

    $data = $this->request->getVar();
    dd($data);

    // $tanggal_penjualan = $this->request->getVar('tanggal_penjualan');
    // $id_barang = $this->request->getVar('id_barang');
    // $kuantitas = $this->request->getVar('kuantitas');
  
    // $this->penjualanModel->db->transStart();
    // $this->barangModel->db->transStart();

    // $this->penjualanModel->savePenjualan($tanggal_penjualan);
    // $no_penjualan = $this->penjualanModel->getInsertID();
    
    // for($i = 0; $i < count($id_barang); $i++) 
    // {
    //   $stok = $this->barangModel->getStokBarang($id_barang[$i]);
    //   $stok -= $kuantitas[$i];
      
    //   $this->barangModel->updateStokBarang($id_barang[$i], $stok);

    //   $harga = $this->barangModel->getHargaBarang($id_barang[$i]);
    //   $sub_total = $kuantitas[$i] * $harga;
      
    //   $this->detailPenjualanModel->saveDetailPenjualan($no_penjualan, $id_barang[$i], $kuantitas[$i], $sub_total);
      
    // }

    // //update penjualan
    // $total_harga = $this->detailPenjualanModel->getTotalHarga($no_penjualan);
    // $this->penjualanModel->updatePenjualan($no_penjualan, $total_harga);

    // $this->barangModel->db->transComplete();
    // $this->penjualanModel->db->transComplete();

    // session()->setFlashdata('pesan', 'Data penjualan berhasil ditambahkan');

    // return redirect()->to(base_url('/penjualan'));
    
  }

}
