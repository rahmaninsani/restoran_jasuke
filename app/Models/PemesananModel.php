<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'no_pemesanan';
    protected $allowedFields = ['no_meja', 'tanggal_pemesanan', 'nama_pelanggan', 'status_pemesanan', 'nrp'];

    // Method untuk memperoleh jumlah pemesanan berdasar status_pemesanan
    public function getJumlahPemesanan($status_pemesanan) {
      $builder = $this->selectCount('status_pemesanan');
      $query = $builder->getWhere(['status_pemesanan' => $status_pemesanan])->getResultArray()[0]['status_pemesanan'];

      return $query;
    }
}