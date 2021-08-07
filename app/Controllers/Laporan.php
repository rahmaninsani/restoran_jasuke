<?php 

namespace App\Controllers;

class Laporan extends BaseController {

  public function index()
  {
    if(! is_kasir()) 
    {
      return redirect()->to(base_url(previous_url()));
    }

    $data = [
      'title' => 'Pelaporan',
    ];

    return view('laporan/index', $data);
  }

}
