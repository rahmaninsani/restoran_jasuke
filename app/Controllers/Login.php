<?php 

namespace App\Controllers;

class Login extends BaseController {

  public function index()
  {
    $data = [
      'title' => 'Masuk',
    ];

    return view('login/index', $data);
  }

}


?>