<?php

namespace App\Models;

use CodeIgniter\Model;

class NotifikasiModel extends Model
{
   protected $table     = 'notifikasi';
   protected $allowedFields = ['id_siswa', 'id_modul', 'status', 'deskripsi'];
   protected $useTimestamps = true;
}