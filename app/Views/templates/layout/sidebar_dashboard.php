<!--Sidebar start-->
<div class="sidebar">
         <img src="img/zayn.jpg" class="profil-image" alt="">
         <h4> Hai! <?= session()->get('nama_depan'); ?></h4>
   <a href="<?php echo base_url('/progressbelajar'); ?>"><i class="fas fa-chart-bar"></i></i><span> Progress Belajar </span></a>
   <a href="#"><i class="fas fa-chalkboard-teacher"></i><span> Kelas Saya </span></a>
   <a href="#"><i class="fas fa-box"></i><span> Katalog </span></a>
   <a href="#"><i class="fas fa-shopping-cart"></i><span> Transactions </span></a>
   <a href="<?php echo base_url('/setting'); ?>"><i class="fas fa-sliders-h"></i><span> Settings </span></a>
   <a href="#"><i class="fas fa-sign-out-alt"></i><span> Log Out </span></a>
</div>
<!--Sidebar End-->