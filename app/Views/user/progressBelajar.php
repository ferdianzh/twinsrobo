<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Progress Belajar Siswa</title>
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('css/stylebaru.css'); ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">
    
  </head>
    <body>
        <!--Sidebar start-->
        <div class="sidebar">
                <img src="img/zayn.jpg" class="profil-image" alt="">
                <h4> Hai! <?= session()->get('nama_depan'); ?></h4>
            <a href="<?php echo base_url('/progressbelajar'); ?>"><i class="fas fa-chart-bar"></i></i><span> Progress Belajar </span></a>
            <a href="<?php echo base_url('/kelas_saya'); ?>"><i class="fas fa-chalkboard-teacher"></i><span> Kelas Saya </span></a>
            <a href="#"><i class="fas fa-box"></i><span> Katalog </span></a>
            <a href="#"><i class="fas fa-shopping-cart"></i><span> Transactions </span></a>
            <a href="<?php echo base_url('/setting'); ?>"><i class="fas fa-sliders-h"></i><span> Settings </span></a>
            <a href="<?php echo base_url('/logout'); ?>"><i class="fas fa-sign-out-alt"></i><span> Log Out </span></a>
        </div>
        <!--Sidebar End-->
        <div class="judul-content">
            <h3> Overview </h3>
        </div>
        <div class="arti-content">
            <h4> Upgrade terus ilmu dan pengalaman terbaru kamu di bidang teknologi </h4>
        </div>
        <!--Box Content 1-->
        <div class="box-content card p-4" style="margin-left: 320px;">
            <h4>My Superpower</h4>
            <img src="img/chart1.png" class="gambar-chart1" alt="">
        </div>
        <!--Box Content 2-->
        <div class="box-content2 card p-4" style="margin-left: 320px;">
            <h4>My Active Progress</h4>
        </div>
        <!--Box Content 3-->
        <div class="box-content3 card p-4" style="margin-left: 720px;">
            <h4>Top 2 Last 7 Days</h4>
        </div>
    </body>