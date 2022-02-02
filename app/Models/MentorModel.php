<?php

namespace App\Models;

use CodeIgniter\Model;

class MentorModel extends Model
{
    protected $table      = 'mentor';
    protected $allowedFields = ['id_user', 'deskripsi_singkat', 'rating'];
    protected $useTimestamps = true;
}
