<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $allowedFields = ['nama_depan', 'nama_belakang', 'email', 'password', 'username', 'tanggal_lahir', 'jenis_kelamin', 'foto'];
    protected $useTimestamps = true;
}
