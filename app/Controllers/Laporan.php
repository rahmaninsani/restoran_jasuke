<?php 

namespace App\Controllers;

class Laporan extends BaseController {

  public function index()
  {
    $data = [
      'title' => 'Pelaporan',
    ];

    return view('laporan/index', $data);
  }

}
