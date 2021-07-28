<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'kode_menu';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['kode_menu','nama','slug','harga','stok' ,'gambar' ,'deskripsi'];

    public function getMenu($slug = false)
    {
        if($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}