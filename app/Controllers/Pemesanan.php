<?php

namespace App\Controllers;

use App\Models\PemesananModel;
use App\Models\DetailPemesananModel;
use App\Models\PembayaranModel;
use App\Models\MejaModel;
use App\Models\MenuModel;

class Pemesanan extends BaseController
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
      'namaMenu' => [
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
  
    // Inisialisasi field
    $tanggal = $this->request->getVar('tanggal');
    $nama_pelanggan = $this->request->getVar('namaPelanggan');
    $no_meja = $this->request->getVar('noMeja');
    $nama_menu = $this->request->getVar('namaMenu');
    $kuantitas = $this->request->getVar('kuantitas');
    
    // Start transaction 
    $this->pemesananModel->db->transStart();
    $this->pembayaranModel->db->transStart();
    $this->mejaModel->db->transStart();
    $this->menuModel->db->transStart();

    // Insert pemesanan dan Get no_pemesanan
    $this->pemesananModel->savePemesanan($no_meja, $tanggal, $nama_pelanggan);
    $no_pemesanan = $this->pemesananModel->getInsertID();

    // Update status_meja menjadi 'Terisi' berdasarkan no_meja
    $this->mejaModel->updateStatusMeja($no_meja, "Terisi");
    
    // Insert pembayaran dan Get no_pembayaran
    $this->pembayaranModel->savePembayaran($tanggal);
    $no_pembayaran = $this->pembayaranModel->getInsertID();

    // Update menu (kurangi stok menu)
    for($i = 0; $i < count($nama_menu); $i++) 
    {
      // Ambil stok menu berdasarkan nama menu, kurangi dengan stok yang dipesan
      $stok = $this->menuModel->getStokMenu($nama_menu[$i]);
      $stok -= $kuantitas[$i];
      
      // Update stok menu berdasarkan nama menu
      $this->menuModel->updateStokMenu($nama_menu[$i], $stok);

      // Get kode_menu berdasarkan nama menu
      $kode_menu = $this->menuModel->getKodeMenu($nama_menu[$i]);

      // Get harga menu berdasarkan nama_menu, hitung subtotal dari harga * kuantias
      $harga = $this->menuModel->getHargaMenu($nama_menu[$i]);
      $subtotal = $kuantitas[$i] * $harga;
      
      // Insert detail_pemesanan
      $this->detailPemesananModel->saveDetailPemesanan($no_pemesanan, $no_pembayaran, $kode_menu, $kuantitas[$i], $subtotal);
      
    }

    // Get total_harga berdasarkan no_pemesanan. Hitung pajak dan total_bayar
    $total_harga = $this->detailPemesananModel->getTotalHarga($no_pemesanan);
    $pajak = 0.10 * $total_harga;
    $total_bayar = $total_harga + $pajak;

    // Update pembayaran
    $this->pembayaranModel->updatePembayaran($no_pembayaran, $total_harga, $pajak, $total_bayar);
    
    // Stop transaction
    $this->menuModel->db->transComplete();
    $this->mejaModel->db->transComplete();
    $this->pembayaranModel->db->transComplete();
    $this->pemesananModel->db->transComplete();
    
    session()->setFlashdata('pesan', 'Data pemesanan berhasil ditambahkan');

    return redirect()->to(base_url('/pemesanan'));
    
  }

  public function detail_pemesanan($no_pemesanan)
  {
    //$detailPemesanan = $this->detailPemesananModel->getDetailPemesanan($no_pemesanan);
    $data = [
      'title'=> 'Detail Pemesanan',
      //'detailPemesanan'=> $detailPemesanan,
    ];

    // if(empty($data['detailPemesanan'])) {
    //   throw new \CodeIgniter\Exceptions\PageNotFoundException("No Pemesanan $no_pemesanan tidak ditemukan.");
    // }
    return view('pemesanan/v_detail_pemesanan', $data);

  }

}
