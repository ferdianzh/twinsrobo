<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatPembelianModel extends Model
{
    protected $table      = 'riwayat_pembelian';
    protected $allowedFields = ['id_pembelian', 'id_siswa', 'id_modul'];
    protected $useTimestamps = true;
}
