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

    $builder = $this->select('pembayaran.*, b.nama_pelanggan');
    $builder->distinct();
    $builder->join('detail_pemesanan a', 'a.no_pembayaran = pembayaran.no_pembayaran');
    $builder->join('pemesanan b', 'b.no_pemesanan = a.no_pemesanan');
    
    $query = $builder->get()->getResultArray();

    return $query; 

    // if($no_pembayaran == false)
    // {
    //   return $this->findAll();
    // }

    // return $this->where(['no_pembayaran' => $no_pembayaran])->first();

  }

  // Insert pembayaran
  public function savePembayaran($tanggal) 
  {
    $data = [
      // 'tanggal_pembayaran' => $tanggal,
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

  // Update uang_bayar, uang_kembalian, dan status_pembayaran ke 'Sudah Bayar' ketika pelangan membayar
  public function updateSudahBayar($no_pembayaran, $uang_bayar, $uang_kembalian)
  {
    $today = date("Y-m-d");
    $data = [  //update makanya pake no_pembayaran
      'no_pembayaran' => $no_pembayaran,
      'tanggal_pembayaran' => $today,
      'uang_bayar' => $uang_bayar,
      'uang_kembalian' => $uang_kembalian,
      'status_pembayaran' => "Sudah Bayar",
      'nrp_kasir' => session()->get('nrp'),
    ];

    return $this->save($data);
  }

  // Update tangal ke null. uang_bayar, uang_kembalian ke 0 dan status_pembayaran ke 'Belum Bayar' ketika pelangan membayar
  public function updateBelumBayar($no_pembayaran)
  {
    $data = [  //update makanya pake no_pembayaran
      'no_pembayaran' => $no_pembayaran,
      'tanggal_pembayaran' => null,
      'uang_bayar' => 0,
      'uang_kembalian' => 0,
      'status_pembayaran' => "Belum Bayar",
      'nrp_kasir' => session()->get('nrp'),
    ];

    return $this->save($data);
  }

  // Delete Pembayaran
  public function deletePembayaran($no_pembayaran) 
  {
    return $this->delete($no_pembayaran);
  }

  public function getTotalBayar($no_pembayaran)
  {
    return $this->select('total_bayar')->where(['no_pembayaran' => $no_pembayaran])->first()['total_bayar'];
  }

  public function getJumlahPembayaran($status_pembayaran) 
  {
    $builder = $this->selectCount('status_pembayaran');
    $query = $builder->getWhere(['status_pembayaran' => $status_pembayaran])->getResultArray()[0]['status_pembayaran'];

    return $query;
  }

  public function getPemasukanHarian() 
  { 
    $today = date("Y-m-d");
    $builder =$this->selectSum('total_bayar');
    $query = $builder->getWhere(['tanggal_pembayaran' => $today])->getResultArray()[0]['total_bayar'];

    return $query;
  }

  public function getPemasukanMingguan() 
  { 
    $firstDay = date('Y-m-d', strtotime("monday -1 week"));
    $lastDay = date('Y-m-d', strtotime("sunday this week"));

    $builder =$this->selectSum('total_bayar');
    $query = $builder->getWhere(['tanggal_pembayaran >=' => $firstDay, 'tanggal_pembayaran <=' => $lastDay])->getResultArray()[0]['total_bayar'];

    return $query;
  }

  public function getPemasukanBulanan() 
  { 
    $firstDay = date('Y-m-01');
    $lastDay = date('Y-m-t');

    $builder =$this->selectSum('total_bayar');
    $query = $builder->getWhere(['tanggal_pembayaran >=' => $firstDay, 'tanggal_pembayaran <=' => $lastDay])->getResultArray()[0]['total_bayar'];

    return $query;
  }
  
  public function getPemasukanTahunan() 
  { 
    $firstDay = date('Y-01-01');
    $lastDay = date('Y-12-t');

    $builder =$this->selectSum('total_bayar');
    $query = $builder->getWhere(['tanggal_pembayaran >=' => $firstDay, 'tanggal_pembayaran <=' => $lastDay])->getResultArray()[0]['total_bayar'];

    return $query;
  }

}