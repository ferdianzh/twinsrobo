<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table      = 'siswa';
    protected $allowedFields = ['id_user', 'nama_sekolah', 'vip'];
    protected $useTimestamps = true;
}
