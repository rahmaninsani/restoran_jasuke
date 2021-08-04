<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'no_pembayaran';
    protected $allowedFields = ['tanggal_pembayaran', 'total_harga', 'pajak', 'total_bayar', 'uang_bayar', 'uang_kembalian', 'status_pembayaran', 'nrp'];

    // Insert pembayaran
    public function savePembayaran($tanggal) 
    {
      $data = [
        'tanggal_pembayaran' => $tanggal,
        'nrp' => session()->get('nrp'),
      ];
      return $this->save($data);
    }

    // Update pembayaran
    public function updatePembayaran($no_pembayaran, $total_harga, $pajak, $total_bayar) 
    {
      $data = [  //update makanya pake no_pembayaran
        'no_pembayaran' => $no_pembayaran,
        'total_harga' => $total_harga,
        'pajak' => $pajak,
        'total_bayar' => $total_bayar,
        //'nrp' => session()->get('nrp'),
      ];

      // if($tanggal != false) {
      //   $data['tanggal_pembayaran'] = $tanggal;
      // }

      return $this->save($data);
      
    }

    public function getPemasukanHarian() 
    { 
      $today = date("Y-m-d");
      $builder =$this->selectSum('total_bayar');
      $query = $builder->getWhere(['tanggal_pembayaran' => $today])->getResultArray()[0]['total_bayar'];

      return $query;
    }
}