<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'no_pembayaran';
    protected $allowedFields = ['tanggal', 'total_harga', 'pajak', 'total_bayar', 'uang_bayar', 'uang_kembalian', 'nrp'];

    public function getPemasukanHarian() 
    { 
      $today = date("Y-m-d");
      $builder =$this->selectSum('total_bayar');
      $query = $builder->getWhere(['tanggal' => $today])->getResultArray()[0]['total_bayar'];

      return $query;
    }
}