<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'no_pemesanan';
    protected $allowedFields = ['no_meja', 'tanggal_pemesanan', 'nama_pelanggan', 'status_pemesanan', 'nrp'];

    public function getPemesanan($no_pemesanan = false)
    {
      if($no_pemesanan == false)
      {
        return $this->findAll();
      }

      return $this->where(['no_pemesanan' => $no_pemesanan])->first();
    }

    // Insert pemesanan
    public function savePemesanan($no_meja, $tanggal, $nama_pelanggan) 
    {
      $data = [
        'no_meja' => $no_meja,
        'tanggal_pemesanan' => $tanggal,
        'nama_pelanggan' => $nama_pelanggan,
        'nrp' => session()->get('nrp'),
      ];

      return $this->save($data);
    }

    // Update pemesanan
    public function updatePemesanan($no_pemesanan, $noMejaBaru, $tanggal, $nama_pelanggan)
    {
      $data = [  // update makanya pake no_pemesanan
        'no_pemesanan' => $no_pemesanan,
        'no_meja' => $noMejaBaru,
        'tanggal' => $tanggal,
        'nama_pelanggan' => $nama_pelanggan,
        'nrp' => session()->get('nrp'),
      ];

      // if($tanggal != false) {
      //   $data['tanggal_pemesanan'] = $tanggal;
      // }

      return $this->save($data);
      
    }

    // Method untuk memperoleh jumlah pemesanan berdasar status_pemesanan
    public function getJumlahPemesanan($status_pemesanan) {
      $builder = $this->selectCount('status_pemesanan');
      $query = $builder->getWhere(['status_pemesanan' => $status_pemesanan])->getResultArray()[0]['status_pemesanan'];

      return $query;
    }


}