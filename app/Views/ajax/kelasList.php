<?php

// $test = $kesulitan->select('gambar')->where('id', 2)->first();
// // var_dump($test);
// echo $test['gambar'];
// die;


?>

<?php foreach ( $kelas as $kls ) : ?>
<a href="" class="myclass-item card p-4 d-flex flex-row mb-4">
   <div class="myclass-image mr-3">
      <div class="child" style="background-image: url('<?= base_url('img/Dashboard.png') ?>')"></div>
   </div>
   <div class="myclass-detail">
      <h4><?= $kls['nama_kelas'] ?></h4>
      <h6 class="myclass-mentor align-self-center my3">Oleh: <?php
         // get mentor name
         foreach ( $mentor as $mtr ) :
            if ( $mtr['id'] == $kls['mentor_id'] ) :
               foreach ( $user as $usr ) :
                  if ( $usr['id'] == $mtr['id_user'] ) :
                     echo $usr['nama_depan'].' '.$usr['nama_belakang'];
                  endif;
               endforeach;
            endif;
         endforeach;
      ?></h6>
      <p class="myclass-description"><?= $kls['deskripsi'] ?></p>
      <div class="myclass-bottom d-flex justify-content-between">
         <div class="myclass-rating d-flex">
            <div class="star align-self-end">
               <?php for ( $rate = 0; $rate < $rating[$kls['kelas_id']]['star_solid']; $rate++ ) : ?>
                  <i class="fas fa-star text-primary"></i>
               <?php endfor; ?>
               <i class="<?= $rating[$kls['kelas_id']]['star_half'] ?> text-primary"></i>
               <?php for ( $rate = 0; $rate < $rating[$kls['kelas_id']]['star_out']; $rate++ ) : ?>
                  <i class="far fa-star text-primary"></i>
               <?php endfor; ?>
            </div>
            <div class="rating align-self-end ml-2">(<?= $rating[$kls['kelas_id']]['average'] ?>)</div>
         </div>
         <?php $sulit = $kesulitan->select('gambar')->where('id', $kls['kesulitan'])->first() ?>
         <img src="<?= base_url('img/isipembelajaran/'.$sulit['gambar']) ?>" alt="" class="myclass-difficulty">
      </div>
   </div>
</a>
<?php endforeach; ?>