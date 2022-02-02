<?php

namespace App\Models;

use CodeIgniter\Model;

class MateriModel extends Model
{
    protected $table      = 'materi';
    protected $allowedFields = ['id_modul', 'judul_materi', 'konten_materi'];
    protected $useTimestamps = true;
}
