<?php

namespace App\Models;

use CodeIgniter\Model;

class VideoTipsModel extends Model
{
    protected $table      = 'video_tips';
    protected $allowedFields = ['id_tips', 'alt_text', 'video_resource'];
    protected $useTimestamps = true;
}
