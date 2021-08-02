<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'kode_menu';
    protected $allowedFields = ['nama', 'slug', 'harga', 'stok' , 'gambar', 'deskripsi'];

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

    public function getJumlahMenu() 
    { 
      $builder = $this->selectCount('kode_menu');
      $query = $builder->getWhere(['stok >' => 0])->getResultArray()[0]['kode_menu'];

      return $query;
    }
}