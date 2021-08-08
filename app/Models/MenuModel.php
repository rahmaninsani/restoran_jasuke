<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'kode_menu';
    protected $allowedFields = ['kode_menu', 'nama', 'slug', 'harga', 'stok' , 'gambar', 'deskripsi'];

    public function search($keyword)
    {
      return $this->table('menu')->like('nama', $keyword);
    }

    public function getMenu($slug = false)
    {
      if($slug == false) {
        return $this->findAll();
      }

      return $this->where(['slug' => $slug])->first();
    }

    // Method untuk memperoleh stok menu berdasarkan nama menu
    public function getStokMenu($nama_menu)
    {
      return $this->select('stok')->where(['nama' => $nama_menu])->first()['stok'];
    }

    // Method untuk update stok menu berdasarkan nama menu
    public function updateStokMenu($nama_menu, $stok)
    {
      $data = [
        'stok' => $stok,
      ];
      return $this->set($data)->where('nama', $nama_menu)->update();
    }

    // Method untuk memperoleh kode_menu berdasarkan nama menu
    public function getKodeMenu($nama_menu)
    {
      return $this->select('kode_menu')->where(['nama' => $nama_menu])->first()['kode_menu'];
    }

    // Method untuk memperoleh nama menu berdasarkan kode_menu
    public function getNamaMenu($kode_menu)
    {
      return $this->select('nama')->where(['kode_menu' => $kode_menu])->first()['nama'];
    }

    // Method untuk memperoleh harga berdasarkan nama menu
    public function getHargaMenu($nama_menu)
    {
      return $this->select('harga')->where(['nama' => $nama_menu])->first()['harga'];
    }

    // Method untuk memperoleh jumlah menu yang tersedia (stok > 0)
    public function getJumlahMenu() 
    { 
      $builder = $this->selectCount('kode_menu');
      $query = $builder->getWhere(['stok >' => 0])->getResultArray()[0]['kode_menu'];

      return $query;
    }

    // Method untuk memperoleh menu terbaru
    public function getMenuTerbaru() 
    {
      $query = "SELECT kode_menu, nama, harga, gambar
        FROM menu
        WHERE kode_menu = (
          SELECT MAX(kode_menu) 
          FROM menu
        );
      ";
      $builder = $this->db->query($query);
  
      $query = $builder->getResultArray()[0];
  
      return $query;
    }

    // Method untuk memperoleh daftar menu yang stok > 0
    public function getMenuTersedia()
    {
      $builder = $this->select(['kode_menu', 'nama']);
      $query = $builder->getWhere(['stok >' => 0])->getResultArray();

      return $query;
    }
}