<?php

namespace App\Models;

use CodeIgniter\Model;

class PembelianModel extends Model
{
    protected $table      = 'pembelian';
    protected $allowedFields = ['order_id', 'id_siswa', 'id_modul', 'rekening_penerima', 'status'];
    protected $useTimestamps = true;
}
