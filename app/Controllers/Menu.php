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
    if(is_kasir()) 
    {
      return redirect()->to(base_url(previous_url()));
    }

    $currentPage = $this->request->getVar('page_menu') ? $this->request->getVar('page_menu') : 
    1;

    $keyword = $this->request->getVar('keyword');
    if ($keyword){
        $menu = $this->menuModel->search($keyword);
    }else{
        $menu = $this->menuModel;
    }    
  
    $data = [
      'title' => 'Menu',
    //   'menu' => $this->menuModel->getMenu()
      'menu' => $menu->paginate(3, 'menu'),
      'pager'=> $this->menuModel->pager, 
      'currentPage' => $currentPage
    ];

    return view('menu/index', $data);
  }

  public function detail($slug)
  {
    if(is_kasir()) 
    {
      return redirect()->to(base_url(previous_url()));
    }

      $data = [
          'title' =>'Menu',
          'menu' => $this->menuModel->getMenu($slug)
      ];

      if(empty($data['menu'])){
          throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama menu'.$slug.'tidak ditemukan');
      }
      return view('menu/detail', $data);
  }

  public function create()
  {
      if(! is_koki()) 
      {
        return redirect()->to(base_url(previous_url()));
      }

      $data = [
          'title' => 'Menu',
          'validation' => \Config\Services::validation()
      ];

      return view('menu/create', $data);
  }

  public function save()
  {
    if(! is_koki()) 
    {
      return redirect()->to(base_url(previous_url()));
    }
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
          $fileGambar->move('assets/img', $namaGambar);
      }


      $slug = url_title($this->request->getVar('nama'), '-', true);

    $data = [
      'kode_menu' => $this->request->getVar('kode_menu'),
      'nama' => $this->request->getVar('nama'),
      'slug' =>$slug,
      'harga' => $this->request->getVar('harga'),
      'stok' => $this->request->getVar('stok'),
      'deskripsi' => $this->request->getVar('deskripsi'),
      'gambar' => $namaGambar
    ];

    $this->menuModel->insert($data);

    session()->setFlashdata('pesan', 'Data menu berhasil ditambahkan');

    return redirect()->to('/menu');
  }

  // public function delete($kode_menu)
  // {
  //   if(! is_koki()) 
  //   {
  //     return redirect()->to(base_url(previous_url()));
  //   }
         //cari gambar berdasarkan kode menu
  //     $menu = $this->menuModel->find($kode_menu);

          //cek jika file gambar default
  //     if($menu['gambar'] != 'default.jpg'){        
          //hapus gambar
  //         unlink('assets/img/' . $menu['gambar']);
  //     }

  //     $this->menuModel->delete($kode_menu);
  //     session()->setFlashdata('pesan', 'Data Menu Berhasil dihapus');
  //     return redirect()->to('/menu');
  // }

  public function edit($slug)
  {
    if(! is_koki()) 
    {
      return redirect()->to(base_url(previous_url()));
    }
      $data = [
          'title' => 'Menu',
          'validation' => \Config\Services::validation(),
          'menu' => $this->menuModel->getMenu($slug)
      ];

      return view('menu/edit', $data);
  }

  public function update($kode_menu)
  { 
    if(! is_koki()) 
    {
      return redirect()->to(base_url(previous_url()));
    }
      // cek judul
      $menuLama = $this->menuModel->getMenu($this->request->getVar('slug'));
      if($menuLama['nama'] == $this->request->getVar('nama')){
          $rule_nama = 'required';
      } else {
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
          $fileGambar->move('assets/img', $namaGambar);
          //hapus file lama
          unlink('assets/img/' . $this->request->getVar('gambarLama'));
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


      session()->setFlashdata('pesan', 'Data menu berhasil diubah');

      return redirect()->to('/menu');
  }
}


?>