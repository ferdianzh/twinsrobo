<?php

namespace App\Models;

use CodeIgniter\Model;

class VideoMateriModel extends Model
{
    protected $table      = 'video_materi';
    protected $allowedFields = ['id_materi', 'alt_text', 'video_resource'];
    protected $useTimestamps = true;
}
