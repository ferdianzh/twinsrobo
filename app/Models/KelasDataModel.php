<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasDataModel extends Model
{
    protected $table      = 'kelas_data';
    protected $allowedFields = ['id_kelas', 'id_user', 'status', 'rating', 'komentar'];
    // protected $table      = 'kelas_data';
    // protected $builder    = $builder->join('kelas', 'kelas.id = kelas_data.id', 'left');
    // protected $allowedFields = ['id_kelas', 'id_user', 'status', 'rating', 'komentar', 'nama_kelas', 'deskripsi'];
    protected $useTimestamps = true;
}
