<?php

namespace App\Models;

use CodeIgniter\Model;

class ModulModel extends Model
{
    protected $table      = 'modul';
    protected $allowedFields = ['id_kategori', 'judul_modul', 'logo', 'harga_modul', 'deskripsi', 'rating'];
    protected $useTimestamps = true;
}
