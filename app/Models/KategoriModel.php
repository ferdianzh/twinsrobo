<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table      = 'kategori';
    protected $allowedFields = ['id_kesulitan', 'nama_kategori', 'deskripsi', 'logo'];
    protected $useTimestamps = true;
}
