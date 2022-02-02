<?php

namespace App\Models;

use CodeIgniter\Model;

class KesulitanModel extends Model
{
    protected $table      = 'kesulitan';
    protected $allowedFields = ['id', 'kesulitan', 'skore'];
    protected $useTimestamps = true;
}
