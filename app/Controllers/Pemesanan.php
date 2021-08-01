<?php

namespace App\Controllers;

class Pemesanan extends BaseController
{
<<<<<<< HEAD

=======
>>>>>>> 74688028d8cdc6c3eb173e99de05e7cb01607b78
  public function index()
  {
    $data = [
      'title' => 'Pemesanan',
    ];

    return view('pemesanan/index', $data);
  }

  public function pencarian_meja()
  {
    $data = [
      'title' => 'Pencarian Meja',
    ];

    return view('pemesanan/pencarian_meja', $data);
  }

  public function tambah_pesanan()
  {
    $data = [
      'title' => 'Tambah Pesanan',
    ];

    return view('pemesanan/tambah_pesanan', $data);
  }

  public function ubah_pesanan()
  {
    $data = [
      'title' => 'Ubah Pesanan',
    ];

    return view('pemesanan/ubah_pesanan', $data);
  }
}
