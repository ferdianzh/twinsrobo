<?php

namespace App\Models;

use CodeIgniter\Model;

class AtmModel extends Model
{
    protected $table      = 'atm';
    protected $allowedFields = ['id_siswa', 'nama_bank', 'no_rekening'];
    protected $useTimestamps = true;
}
