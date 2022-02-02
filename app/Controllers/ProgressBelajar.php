<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class ProgressBelajar extends BaseController 
{
    
    public function home()
    {
        // last cookie id = q1icmignq2odolf0qns5hc14pk989r7l
        // var_dump(session_id()); die;
        // $session=session();
        $UserModel = new UserModel();
        return view('user/progressBelajar');  
    }
}