<?php 

namespace App\Controllers;

use App\Models\MenuModel;

class Menu extends BaseController {

protected $menuModel;
public function __construct()
{
    $this->menuModel = new MenuModel();
}
  public function index()
  {
    $data = [
      'title' => 'Menu',
      'menu' => $this->menuModel->getMenu()
  ];

  return view('menu/index', $data);
  }

  public function detail($slug)
  {

      $data = [
          'title' =>'Menu',
          'menu' => $this->menuModel->getMenu($slug)
      ];

      if(empty($data['menu'])){
          throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama menu'.$slug.'tidak ditemukan.');
      }
      return view('menu/detail', $data);
  }

  public function create()
  {
      // session();
      $data = [
          'title' => 'Menu',
          'validation' => \Config\Services::validation()
      ];

      return view('menu/create', $data);
  }

  public function save()
  {
      //validasi input
      if(!$this->validate([
          'nama' => [
              'rules' => 'required|is_unique[menu.nama]',
              'errors' => [
                  'required' => '{field} menu harus diisi.',
                  'is_unique' => '{field} menu sudah terdaftar'
              ] 
              ],
            'kode_menu' => [
                'rules' => 'required|is_unique[menu.kode_menu]',
                'errors' => [
                    'required' => '{field} menu harus diisi.',
                    'is_unique' => '{field} menu sudah terdaftar'
                ] 
                ],
              'gambar' => [
                  'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
              
              'errors' => [
                  'max_size' => 'Ukuran gambar terlalu besar',
                  'is_image' => 'Yang anda pilih bukan gambar',
                  'mime_in' => 'Yang anda pilih bukan gambar'
              ]
              ]
      ])) {

          return redirect()->to('/menu/create')->withInput(); 
      }

      //ambil gambar
      $fileGambar = $this->request->getFile('gambar');
      // apakah tidak ada gambar yang diupload
      if ($fileGambar->getError() == 4) {
          $namaGambar = 'default.jpg';
      } else {
          //generate nama gambar 
          $namaGambar = $fileGambar->getRandomName();
          //pindahkan file ke folder img
          $fileGambar->move('img', $namaGambar);
      }


      $slug = url_title($this->request->getVar('nama'), '-', true);
      $this->menuModel->save([
          'kode_menu' => $this->request->getVar('kode_menu'),
          'nama' => $this->request->getVar('nama'),
          'slug' =>$slug,
          'harga' => $this->request->getVar('harga'),
          'stok' => $this->request->getVar('stok'),
          'deskripsi' => $this->request->getVar('deskripsi'),
          'gambar' => $namaGambar

      ]);


      session()->setFlashdata('pesan', 'Data berhasil ditambahakan.');

      return redirect()->to('/menu');
  }

  public function delete($kode_menu)
  {
      //cari gambar berdasarkan kode menu
      $menu = $this->menuModel->find($kode_menu);

      //cek jika file gambar default
      if($menu['gambar'] != 'default.jpg'){        
          //hapus gambar
          unlink('img/' . $menu['gambar']);
      }

      $this->menuModel->delete($kode_menu);
      session()->setFlashdata('pesan', 'Data berhasil dihapus');
      return redirect()->to('/menu');
  }

  public function edit($slug)
  {
      $data = [
          'title' => 'Menu',
          'validation' => \Config\Services::validation(),
          'menu' => $this->menuModel->getMenu($slug)
      ];

      return view('menu/edit', $data);
  }

  public function update($kode_menu)
  {
      // cek judul
      $menuLama = $this->menuModel->getMenu($this->request->getVar('slug'));
      if($menuLama['nama'] == $this->request->getVar('nama')){
          $rule_nama = 'required';
      }else{
          $rule_nama = 'required|is_unique[menu.nama]';
      }



      if(!$this->validate([
          'nama' => [
              'rules' => $rule_nama,
              'errors' => [
                  'required' => '{field} menu harus diisi.',
                  'is_unique' => '{field} menu sudah terdaftar'
              ] 
              ],
              'gambar' => [
                  'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
              
              'errors' => [
                  'max_size' => 'Ukuran gambar terlalu besar',
                  'is_image' => 'Yang anda pilih bukan gambar',
                  'mime_in' => 'Yang anda pilih bukan gambar'
              ]
              ]
      ])) {
          return redirect()->to('/menu/edit/' . $this->request->getVar('slug'))->withInput(); 

      }

      $fileGambar = $this->request->getFile('gambar');

      // cek gambar , apakah tetap gambar lama 
      if($fileGambar->getError() == 4){
          $namaGambar = $this->request->getVar('gambarLama');
      }else{
          //genered nama file random
          $namaGambar = $fileGambar->getRandomName();
          //pindahkan gambar
          $fileGambar->move('img', $namaGambar);
          //hapus file lama
          unlink('img/' . $this->request->getVar('gambarLama'));
      }

      $slug = url_title($this->request->getVar('nama'), '-', true);
      $this->menuModel->save([
          'kode_menu' => $kode_menu,
          'nama' => $this->request->getVar('nama'),
          'slug' =>$slug,
          'harga' => $this->request->getVar('harga'),
          'stok' => $this->request->getVar('stok'),
          'gambar' => $namaGambar,
          'deskripsi' => $this->request->getVar('deskripsi')
      ]);


      session()->setFlashdata('pesan', 'Data berhasil diubah.');

      return redirect()->to('/menu');
  }

}


?>