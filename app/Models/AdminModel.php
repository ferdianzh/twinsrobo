<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table      = 'admin';
    protected $allowedFields = ['nama', 'email', 'password', 'tipe_admin', 'foto'];
    protected $useTimestamps = true;
}
