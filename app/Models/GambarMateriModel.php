<?php

namespace App\Models;

use CodeIgniter\Model;

class GambarMateriModel extends Model
{
    protected $table      = 'gambar_materi';
    protected $allowedFields = ['id_materi', 'alt_text', 'foto'];
    protected $useTimestamps = true;
}
