<?php 

namespace App\Models;

use CodeIgniter\Model;

class DetailPemesananModel extends Model 
{
  protected $table      = 'detail_pemesanan';
  protected $allowedFields = ['no_pemesanan', 'no_pembayaran', 'kode_menu', 'kuantitas', 'subtotal'];

  public function getMenuTerlaris() {
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
    $query = $builder->getResultArray()[0];

    return $query;
  }
}


?>