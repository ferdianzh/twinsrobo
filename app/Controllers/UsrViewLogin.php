<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\KelasModel;
use App\Models\KelasDataModel;
use App\Models\KesulitanModel;
use App\Models\MentorModel;

class UsrViewLogin extends BaseController
{

   public function __construct()
   {
      $this->session = session();
      $this->userModel = new UserModel();
      $this->kelasModel = new KelasModel();
      $this->kelasDataModel = new KelasDataModel();
      $this->mentorModel = new MentorModel();
      $this->kesulitanModel = new KesulitanModel();
   }
   
   public function kelasSaya()
   {
      $this->session->setFlashData('title', 'Kelas Saya');

      $userId = $this->session->get('user_id');

      $data['user'] = $this->userModel->where(['id' => $userId])->first();
      
      if (isset($data['user']['id'])) {
         return view('user/kelassaya', $data);
      } else {
         return redirect()->to('/login');
      }
   }

   public function showKelasList()
   {
      $userId = $_POST['userId'];
      $status = $_POST['status'];
      
      $queryMentor = $this->mentorModel->select('id, id_user')->findAll();
      $queryUser = $this->userModel->select('id, nama_depan, nama_belakang')->findAll();

      $queryUserClass = $this->kelasDataModel->where(['user_id' => $userId, 'status' => $status]);
      $queryClassDetail = $queryUserClass->join('kelas', 'kelas.id = kelas_id', 'left')->findAll();

      $queryClassId = $queryUserClass->select('kelas_id')->findAll();

      $classRating = [];
      foreach ( $queryClassId as $class ) {
         $classId = $class['kelas_id'];
         if ( empty($classRating) || !array_key_exists($classId, $classRating) ) {
            $queryRating = $this->kelasDataModel->where(['kelas_id' => $classId])->selectAvg('user_rating')->first();
            $roundedRating = round($queryRating['user_rating'],1);

            $rating = $this->getRating($roundedRating);
            
            $classRating += [ $classId => [
               'average' => $rating['roundedRating'],
               'star_solid' => $rating['starSolid'],
               'star_half' => $rating['starHalf'],
               'star_out' => $rating['starOut'],
               ]
            ];
         }
      }

      $kesulitan = $this->kesulitanModel;

      $data = [
         'kelas' => $queryClassDetail,
         'rating' => $classRating,
         'mentor' => $queryMentor,
         'user' => $queryUser,
         'kesulitan' => $kesulitan,
      ];

      if (!empty($data['kelas'])) {
         return view('ajax/kelaslist', $data);
      } else {
         $data = ['status' => 'kelas '.$status];
         return view('ajax/dataKosong', $data);
      }
   }
   
   private function getRating($rating)
   {
      $data = [];

      $data['roundedRating'] = $rating;
      $data['starSolid'] = floor($rating);
      $decimal = $rating - $data['starSolid'];
      $data['starHalf'] = '';
      $filledHalf = false;
      if ( $decimal < 0.3 ) $data['starHalf'] = '';
      elseif ( $decimal > 0.7 ) { $data['starHalf'] = 'fas fa-star'; $filledHalf = true; }
      else { $data['starHalf'] = 'fas fa-star-half-alt'; $filledHalf = true; }
      $data['starOut'] = 5 - $data['starSolid'];
      if ( $filledHalf ) $data['starOut'] -= 1;

      return $data;
   }

}