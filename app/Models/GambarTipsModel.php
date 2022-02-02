<?php

namespace App\Models;

use CodeIgniter\Model;

class GambarTipsModel extends Model
{
    protected $table      = 'gambar_tips';
    protected $allowedFields = ['id_tips', 'alt_text', 'foto'];
    protected $useTimestamps = true;
}
