<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table      = 'kelas';
    protected $allowedFields = ['id_mentor', 'nama_kelas', 'deskripsi','kesulitan'];
    protected $useTimestamps = true;
}
