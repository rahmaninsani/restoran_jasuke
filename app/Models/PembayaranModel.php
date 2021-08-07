<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
  protected $table = 'pembayaran';
  protected $primaryKey = 'no_pembayaran';
  protected $allowedFields = ['tanggal_pembayaran', 'total_harga', 'pajak', 'total_bayar', 'uang_bayar', 'uang_kembalian', 'status_pembayaran', 'nrp_kasir'];

  // Get pembayaran
  public function getPembayaran($no_pembayaran = false)
  {
    if($no_pembayaran == false)
    {
      return $this->findAll();
    }

    return $this->where(['no_pembayaran' => $no_pembayaran])->first();

  }

  // Insert pembayaran
  public function savePembayaran($tanggal) 
  {
    $data = [
      'tanggal_pembayaran' => $tanggal,
      'nrp_kasir' => session()->get('nrp'),
    ];
    return $this->save($data);
  }

  // Update pembayaran
  public function updatePembayaran($no_pembayaran, $total_harga, $pajak, $total_bayar, $tanggal = false) 
  {
    $data = [  //update makanya pake no_pembayaran
      'no_pembayaran' => $no_pembayaran,
      'total_harga' => $total_harga,
      'pajak' => $pajak,
      'total_bayar' => $total_bayar,
      'nrp_kasir' => session()->get('nrp'),
    ];

    if($tanggal != false) {
      $data['tanggal_pembayaran'] = $tanggal;
    }

    return $this->save($data);
    
  }

  // Delete Pembayaran
  public function deletePembayaran($no_pembayaran) 
  {
    return $this->delete($no_pembayaran);
  }

  public function getPemasukanHarian() 
  { 
    $today = date("Y-m-d");
    $builder =$this->selectSum('total_bayar');
    $query = $builder->getWhere(['tanggal_pembayaran' => $today])->getResultArray()[0]['total_bayar'];

    return $query;
  }
}