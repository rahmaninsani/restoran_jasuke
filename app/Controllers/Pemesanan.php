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
    if(is_kasir()) 
    {
      return redirect()->to(base_url(previous_url()));
    }

    $pemesanan = $this->pemesananModel->getPemesanan();
    $data = [
      'title' => 'Pemesanan',
      'pemesanan' => $pemesanan,
    ];

    return view('pemesanan/v_pemesanan', $data);
  }

  public function tambah_pemesanan()
  {
    if(! is_pelayan()) 
    {
      return redirect()->to(base_url(previous_url()));
    }

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
    if(! is_pelayan()) 
    {
      return redirect()->to(base_url(previous_url()));
    }

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
		])) 
    {
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

      // Get harga menu berdasarkan nama_menu, hitung subtotal dari harga * kuantias
      $harga = $this->menuModel->getHargaMenu($nama_menu[$i]);
      $subtotal = $kuantitas[$i] * $harga;

      // Get kode_menu berdasarkan nama menu
      $kode_menu = $this->menuModel->getKodeMenu($nama_menu[$i]);
      
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
    if(is_kasir()) 
    {
      return redirect()->to(base_url(previous_url()));
    }

    $detailPemesanan = $this->detailPemesananModel->getDetailPemesanan($no_pemesanan);
    
    $data = [
      'title'=> 'Detail Pemesanan',
      'detailPemesanan'=> $detailPemesanan,
    ];

    if(empty($data['detailPemesanan'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException("No pemesanan $no_pemesanan tidak ditemukan.");
    }
    return view('pemesanan/v_detail_pemesanan', $data);

  }

  public function ubah_pemesanan($no_pemesanan)
	{
    if(! is_pelayan()) 
    {
      return redirect()->to(base_url(previous_url()));
    }

    $mejaKosong = $this->mejaModel->getMejaKosong();
    $menuTersedia = $this->menuModel->getMenuTersedia();
    $pemesanan = $this->pemesananModel->getPemesanan($no_pemesanan);
    $detailPemesananMenu = $this->detailPemesananModel->getDaftarMenu($no_pemesanan);

    for($i = 0; $i < count($detailPemesananMenu); $i++)
    {
      $detailPemesananMenu[$i]['kode_menu'] = $this->menuModel->getNamaMenu($detailPemesananMenu[$i]['kode_menu']);
      $detailPemesananMenu[$i]['nama'] = $detailPemesananMenu[$i]['kode_menu']; 
      unset($detailPemesananMenu[$i]['kode_menu']);
    }

		$data = [
			'title' => 'Edit Pemesanan',
      'mejaKosong' => $mejaKosong,
      'menuTersedia' => $menuTersedia,			
			'pemesanan' => $pemesanan,
			'detailPemesananMenu' => $detailPemesananMenu,
      'validation' => \Config\Services::validation(),
		];

		if(empty($data['pemesanan'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException("No pemesanan $no_pemesanan tidak ditemukan.");
    }

		return view('pemesanan/v_ubah_pemesanan', $data);

	}

  public function update($no_pemesanan)
	{
    if(! is_pelayan()) 
    {
      return redirect()->to(base_url(previous_url()));
    }

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
		]))
    {
			return redirect()->to(base_url("/pemesanan/ubah_pemesanan/$no_pemesanan"))->withInput();
		};

    // Inisialisasi field
    $no_pembayaran = $this->detailPemesananModel->getNoPembayaran($no_pemesanan);

    $tanggal = $this->request->getVar('tanggal');
    $nama_pelanggan = $this->request->getVar('namaPelanggan');

    $noMejaLama = $this->request->getVar('noMejaLama');
    $noMejaBaru = $this->request->getVar('noMeja');

    $namaMenuLama = $this->request->getVar('namaMenuLama');
    $namaMenuBaru = $this->request->getVar('namaMenu');

    $kuantitasLama = $this->request->getVar('kuantitasLama');
    $kuantitasBaru = $this->request->getVar('kuantitas');

    // Start transaction 
    $this->pemesananModel->db->transStart();
    $this->pembayaranModel->db->transStart();
    $this->mejaModel->db->transStart();
    $this->menuModel->db->transStart();

    // Jika terjadi perubahan no_meja yang dipilih
    if($noMejaBaru != $noMejaLama)
    {
      // Update meja lama menjadi 'Kosong'
      $this->mejaModel->updateStatusMeja($noMejaLama, "Kosong");

      // Update meja baru menjadi 'Terisi'
      $this->mejaModel->updateStatusMeja($noMejaBaru, "Terisi");
    }
    
    // Update menu (tambah/kurangi stok menu)
    for($i = 0; $i < count($namaMenuBaru); $i++) 
    {
      //Jika terdapat update pada row yang sudah ada (memiliki input hidden namaMenuLama/kuantitasLama)
      if(array_key_exists($i, $namaMenuLama))
      {  
        // Jika nama menu lama dan nama menu baru valuenya tidak sama (ada perubahan)
        if($namaMenuBaru[$i] != $namaMenuLama[$i]) {
          // Ambil stok menu lama berdasarkan nama menu lama, tambahkan dengan stok yang diubah
          $stokMenuLama = $this->menuModel->getStokMenu($namaMenuLama[$i]);
          $stokMenuLama += $kuantitasLama[$i];
          $this->menuModel->updateStokMenu($namaMenuLama[$i], $stokMenuLama);

          // Ambil stok menu baru berdasarkan nama menu baru, kurangi dengan stok yang dipesan
          $stokMenuBaru = $this->menuModel->getStokMenu($namaMenuBaru[$i]);
          $stokMenuBaru -= $kuantitasBaru[$i];
          $this->menuModel->updateStokMenu($namaMenuBaru[$i], $stokMenuBaru);

        } else { 
          // Jika nama menu lama dan nama menu baru valuenya sama (tidak ada perubahan)

          // Ambil stok menu lama/baru berdasarkan nama menu lama/baru, tambahkan/kurangi dengan stok yang diubah
          $stok = $this->menuModel->getStokMenu($namaMenuBaru[$i]);

          // Jika kuantitas menu baru > kuantitas menu lama
          if($kuantitasBaru[$i] > $kuantitasLama[$i]) {
            $kuantitas = $kuantitasBaru[$i] - $kuantitasLama[$i];
            $stok -= $kuantitas;
          } else { 
            // Jika kuantitas menu baru < kuantitas menu lama
            $kuantitas = $kuantitasLama[$i] - $kuantitasBaru[$i];
            $stok += $kuantitas;
          }

          $this->menuModel->updateStokMenu($namaMenuBaru[$i], $stok);

        }

        // Get harga menu berdasarkan namaMenuBaru, hitung subtotal dari harga * kuantiasBaru
        $harga = $this->menuModel->getHargaMenu($namaMenuBaru[$i]);
        $subtotal = $kuantitasBaru[$i] * $harga;

        // Get kode_menu lama berdasarkan namaMenuLama
        $kodeMenuLama = $this->menuModel->getKodeMenu($namaMenuLama[$i]);

        // Get kode_menu baru berdasarkan namaMenuBaru
        $kodeMenuBaru = $this->menuModel->getKodeMenu($namaMenuBaru[$i]);

        // Update detail_pemesanan
        $this->detailPemesananModel->updateDetailPemesanan($no_pemesanan, $kodeMenuLama, $kodeMenuBaru, $kuantitasBaru[$i], $subtotal);

      } else { 
        // Jika terdapat penambahan row baru (insert bukan update)
        $stok = $this->menuModel->getStokMenu($namaMenuBaru[$i]);
        $stok -= $kuantitasBaru[$i];
      
        $this->menuModel->updateStokMenu($namaMenuBaru[$i], $stok);

        $harga = $this->menuModel->getHargaMenu($namaMenuBaru[$i]);
        $subtotal = $kuantitasBaru[$i] * $harga;

        // Get kode_menu baru berdasarkan namaMenuBaru
        $kodeMenuBaru = $this->menuModel->getKodeMenu($namaMenuBaru[$i]);
        
        $this->detailPemesananModel->saveDetailPemesanan($no_pemesanan, $no_pembayaran, $kodeMenuBaru, $kuantitasBaru[$i], $subtotal);

      }
    }

    // Update pemesanan
    $this->pemesananModel->updatePemesanan($no_pemesanan, $noMejaBaru, $tanggal, $nama_pelanggan);
    $this->pemesananModel->updateDetailPemesanan($no_pemesanan);

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

    session()->setFlashdata('pesan', 'Data pemesanan berhasil diubah');

    return redirect()->to(base_url("/pemesanan/$no_pemesanan"));
    
  }

  public function ubah_status($no_pemesanan, $status_pemesanan = "Belum Selesai")
  {
    if(! is_koki()) 
    {
      return redirect()->to(base_url(previous_url()));
    }

    $this->pemesananModel->updateDetailPemesanan($no_pemesanan, $status_pemesanan);

    session()->setFlashdata('pesan', 'Status pemesanan berhasil diubah');

		return redirect()->to(base_url("/pemesanan/$no_pemesanan"));
    
  }

  public function delete_pemesanan($no_pemesanan)
  {
    if(! is_pelayan()) 
    {
      return redirect()->to(base_url(previous_url()));
    }

    // Get daftar menu
    $menu = $this->detailPemesananModel->getDaftarMenu($no_pemesanan);

    // Get no_meja
    $no_meja = $this->pemesananModel->getNoMeja($no_pemesanan);

    // Get no_pembayaran
    $no_pembayaran = $this->detailPemesananModel->getNoPembayaran($no_pemesanan);

    // Start transaction 
    $this->pemesananModel->db->transStart();
    $this->pembayaranModel->db->transStart();
    $this->mejaModel->db->transStart();
    $this->menuModel->db->transStart();

    for($i = 0; $i < count($menu); $i++) {
      $kode_menu = $menu[$i]['kode_menu'];
      $nama_menu = $this->menuModel->getNamaMenu($kode_menu);
      $stok = $this->menuModel->getStokMenu($nama_menu);
      
      $stok += $menu[$i]['kuantitas'];
      
      $this->menuModel->updateStokMenu($nama_menu, $stok);   
    }

    // Hapus pemesanan dan pembayaran
    $this->pemesananModel->deletePemesanan($no_pemesanan);
    $this->pembayaranModel->deletePembayaran($no_pembayaran);

    // Update status_meja
    $this->mejaModel->updateStatusMeja($no_meja, "Kosong");
    
    // Stop transaction
    $this->menuModel->db->transComplete();
    $this->mejaModel->db->transComplete();
    $this->pembayaranModel->db->transComplete();
    $this->pemesananModel->db->transComplete();

		session()->setFlashdata('pesan', 'Data pemesanan berhasil dihapus');

		return redirect()->to(base_url('/pemesanan'));
  }

  public function delete_detail_pemesanan($no_pemesanan, $nama_menu)
  {
    if(! is_pelayan()) 
    {
      return redirect()->to(base_url(previous_url()));
    }

    $kode_menu = $this->menuModel->getKodeMenu($nama_menu);

    $kuantitas = $this->detailPemesananModel->getKuantitas($no_pemesanan, $kode_menu);

    $stok = $this->menuModel->getStokMenu($nama_menu);
    $stok += $kuantitas;

   // Start transaction 
    $this->pemesananModel->db->transStart();
    $this->pembayaranModel->db->transStart();
    $this->menuModel->db->transStart();
    
    $this->menuModel->updateStokMenu($nama_menu, $stok);  
    
    $this->detailPemesananModel->deleteDetailPemesanan($no_pemesanan, $kode_menu);

    // Update pemesanan
    $this->pemesananModel->updateDetailPemesanan($no_pemesanan);

    // Get no_pembayaran
    $no_pembayaran = $this->detailPemesananModel->getNoPembayaran($no_pemesanan);

    // Get total_harga berdasarkan no_pemesanan. Hitung pajak dan total_bayar
    $total_harga = $this->detailPemesananModel->getTotalHarga($no_pemesanan);
    $pajak = 0.10 * $total_harga;
    $total_bayar = $total_harga + $pajak;
    
    // Update pembayaran
    $this->pembayaranModel->updatePembayaran($no_pembayaran, $total_harga, $pajak, $total_bayar);

    // Stop transaction
    $this->menuModel->db->transComplete();
    $this->pembayaranModel->db->transComplete();
    $this->pemesananModel->db->transComplete();

		session()->setFlashdata('pesan', 'Data pemesanan berhasil dihapus');

		return redirect()->to(base_url("/pemesanan/$no_pemesanan"));
  }





}
