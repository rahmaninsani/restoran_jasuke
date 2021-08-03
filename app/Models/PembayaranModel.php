<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'no_pembayaran';
    protected $allowedFields = ['tanggal_pembayaran', 'total_harga', 'pajak', 'total_bayar', 'uang_bayar', 'uang_kembalian', 'status_pembayaran', 'nrp'];

    public function getPemasukanHarian() 
    { 
      $today = date("Y-m-d");
      $builder =$this->selectSum('total_bayar');
      $query = $builder->getWhere(['tanggal_pembayaran' => $today])->getResultArray()[0]['total_bayar'];

      return $query;
    }
}