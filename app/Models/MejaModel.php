<?php

namespace App\Models;

use CodeIgniter\Model;

class MejaModel extends Model
{
    protected $table      = 'meja';
    protected $primaryKey = 'no_meja';
    protected $allowedFields = ['status'];

    public function getMeja($no_meja = false)
    {
      if($no_meja == false)
      {
        return $this->findAll();
      }

      return $this->where(['no_meja' => $no_meja])->first();
    }

    public function getStatusMeja($status) 
    { 
      $builder = $this->selectCount('status');
      $query = $builder->getWhere(['status' => $status])->getResultArray()[0]['status'];

      return $query;
    }

    // public function updatePenjualan($no_penjualan, $total_harga, $tanggal_penjualan = false) 
    // {
    //   $data = [  //update makanya pake no_penjualan
    //     'no_penjualan' => $no_penjualan,
    //     'total_harga' => $total_harga,
    //     'nip' => session()->get('nip'),
    //   ];

    //   if($tanggal_penjualan != false) {
    //     $data['tanggal_penjualan'] = $tanggal_penjualan;
    //   }

    //   return $this->save($data);
    // }

}