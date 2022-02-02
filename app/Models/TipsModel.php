<?php

namespace App\Models;

use CodeIgniter\Model;

class TipsModel extends Model
{
    protected $table      = 'tips';
    protected $allowedFields = ['id_kategori', 'judul_tips', 'konten_tips'];
    protected $useTimestamps = true;
}
