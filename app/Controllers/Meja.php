<?php 

namespace App\Controllers;

use App\Models\MejaModel;

class Meja extends BaseController {
  protected $mejaModel;

  public function __construct()
  {
    $this->mejaModel = new MejaModel();
  }

  public function index()
  {
    $meja = $this->mejaModel->getMeja();
    $data = [
      'title' => 'Pencarian Meja',
      'meja' => $meja,
    ];

    return view('meja/v_meja', $data);
    
  }

}


?>