<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
  protected $table      = 'pegawai';
  protected $primaryKey = 'nrp';
  protected $allowedFields = ['nama', 'jabatan', 'jenis_kelamin', 'username','password'];

  public function getPegawai($username)
  {
    return $this->where([
      'username' => $username,
    ])
    ->first();
  }
}