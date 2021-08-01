<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
  protected $table      = 'pegawai';
  protected $primaryKey = 'nrp';
  protected $allowedFields = ['nama', 'jabatan', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'no_telepon','username','password'];

  public function getNrpPegawai($nrp)
  {
    return $this->where([
      'nrp' => $nrp,
    ])
    ->first();
  } 

  public function getPegawai($username)
  {
    return $this->where([
      'username' => $username,
    ])
    ->first();
  }
}