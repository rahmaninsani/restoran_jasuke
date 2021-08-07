<?php 

namespace App\Models;

use CodeIgniter\Model;

class DetailPemesananModel extends Model 
{
  protected $table      = 'detail_pemesanan';
  protected $allowedFields = ['no_pemesanan', 'no_pembayaran', 'kode_menu', 'kuantitas', 'subtotal'];

  // Get detail_pemesanan
  public function getDetailPemesanan($no_pemesanan) 
  {
    $builder = $this->select('a.*, b.*, c.kode_menu, c.nama, c.harga, detail_pemesanan.kuantitas, detail_pemesanan.subtotal');
    $builder->join('pemesanan a', 'a.no_pemesanan = detail_pemesanan.no_pemesanan');
    $builder->join('pembayaran b', 'b.no_pembayaran = detail_pemesanan.no_pembayaran');
    $builder->join('menu c', 'c.kode_menu = detail_pemesanan.kode_menu');

    $query = $builder->getWhere(['detail_pemesanan.no_pemesanan' => $no_pemesanan])->getResultArray();

    return $query; 
  }
  
  public function getMenuTerlaris() 
  {
    $lastWeek = date("Y-m-d", strtotime("-1 week"));
    $today = date("Y-m-d");

    $query = "SELECT a.kode_menu, a.nama, a.harga, a.gambar, SUM(ab.kuantitas) AS 'jumlah_terjual'
      FROM menu a
      INNER JOIN detail_pemesanan ab USING(kode_menu)
      INNER JOIN pembayaran b USING(no_pembayaran)
      WHERE b.tanggal_pembayaran BETWEEN '" . $lastWeek . "' AND '" . $today . "'
      GROUP BY ab.kode_menu
      ORDER BY SUM(ab.kuantitas) DESC
      LIMIT 1;
    ";
    
    $builder = $this->db->query($query);
    if(array_key_exists(0, $builder->getResultArray())) 
    {
      $query = $builder->getResultArray()[0];
      return $query;
    }

    return;
  }

  // Insert detail_pemesanan
  public function saveDetailPemesanan($no_pemesanan, $no_pembayaran, $kode_menu, $kuantitas, $subtotal)
  {
    $data = [
      'no_pemesanan' => $no_pemesanan,
      'no_pembayaran' => $no_pembayaran,
      'kode_menu' => $kode_menu,
      'kuantitas' => $kuantitas,
      'subtotal' => $subtotal,
    ];

    return $this->save($data);

  }

  // Update detail_pemesanan
  public function updateDetailPemesanan($no_pemesanan, $kodeMenuLama, $kodeMenuBaru, $kuantitasBaru, $subtotal)
  {
    $data = [
      'kode_menu' => $kodeMenuBaru,
      'kuantitas' => $kuantitasBaru,
      'subtotal' => $subtotal,
    ];

    return $this->set($data)
    ->where([
      'no_pemesanan' => $no_pemesanan, 
      'kode_menu' => $kodeMenuLama,
      ])
    ->update();

  }

  // Delete detail_pemesanan
  public function deleteDetailPemesanan($no_pemesanan, $kode_menu)
  {
    return $this->where([
      'no_pemesanan' => $no_pemesanan, 
      'kode_menu' => $kode_menu,
      ])
    ->delete();
  }

  // Get total_harga berdasarkan no_pemesanan
  public function getTotalHarga($no_pemesanan)
  {
    $builder = $this->selectSum('subtotal');
    $query = $builder->getWhere(['no_pemesanan' => $no_pemesanan])->getResultArray()[0]['subtotal'];

    return $query;
  }

  // Get daftar menu berdasarkan no_pemesanan
  public function getDaftarMenu($no_pemesanan)
  {
    $builder = $this->select(['kode_menu', 'kuantitas']);
    $query = $builder->getWhere(['no_pemesanan' => $no_pemesanan])->getResultArray();

    return $query;

  }

  // Get no_pembayaran berdasarkan no_pemesanan
  public function getNoPembayaran($no_pemesanan)
  {
    return $this->select('no_pembayaran')->where(['no_pemesanan' => $no_pemesanan])->first()['no_pembayaran'];
  }

  // Get kuantias berdasarkan no_pemesanan dan $kode_menu
  public function getKuantitas($no_pemesanan, $kode_menu)
  {
    return $this->select('kuantitas')
    ->where([
      'no_pemesanan' => $no_pemesanan, 
      'kode_menu' => $kode_menu,
      ])
    ->first()['kuantitas'];  
  }

}


?>