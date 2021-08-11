<?php 

namespace App\Controllers;
use App\Models\PegawaiModel;

class Login extends BaseController {
  protected $pegawaiModel;

  public function __construct()
  {
    $this->pegawaiModel = new PegawaiModel();
  }

  public function index()
  {
    if(session()->get('nrp')) 
    {
			return redirect()->to(base_url('/beranda'));
		}

    $data = [
      'title' => 'Masuk | Resto Unikom',
    ];

    return view('login/v_login', $data);
  }

  public function auth()
  {
    $username = $this->request->getVar('username');
    $password = $this->request->getVar('password');

    $pegawai = $this->pegawaiModel->getPegawai($username);
    
    if($pegawai) {
      if(($pegawai['username'] == $username) && ($pegawai['password'] == $password)) {
        $data = [
          'nrp' => $pegawai['nrp'],
          'nama' => $pegawai['nama'],
          'jabatan' => $pegawai['jabatan'],
          'username' => $pegawai['username'],
          'logged_in' => true,
          // 'passphrase' => openssl_random_pseudo_bytes(16),
          // 'iv' => openssl_random_pseudo_bytes(16),
        ];

        session()->set($data);
        session()->setFlashdata('pesan', 'Anda berhasil masuk');
        
        return redirect()->to(base_url('/beranda'));

      } else {
        session()->setFlashdata('pesan', 'Password salah.');
        return redirect()->to(base_url('/login'));
      }
    } else {
      session()->setFlashdata('pesan', 'Username salah.');
      return redirect()->to(base_url('/login'));
    }
  }
    
  public function logout()
  {
    session()->destroy();
    return redirect()->to(base_url('/login'));
  }

}


?>