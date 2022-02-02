<?php $session = \Config\Services::session() ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Custom Theme Style -->
   <link href="<?php echo base_url('css/stylebaru.css'); ?>" rel="stylesheet">
   <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet"> -->
   
   <!-- punya hafizh -->
   <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
   <link rel="stylesheet" href="<?= base_url('css/user/style_myclass.css') ?>">
   <link rel="stylesheet" href="<?= base_url('css/fontawesome-free-5.15.4-web/css/all.css') ?>">

   <script src="<?= base_url('/js/jquery-3.6.0.js') ?>"></script>

   <title><?= $session->getFlashdata('title') ?></title>
</head>

<body style="background-color: #f0f8fe;">
    <!-- sidebar -->
    <?= $this->include('/templates/layout/sidebar_dashboard'); ?>
    <!-- Akhir sidebar -->

    <!-- Jumbotron -->

    <!-- Content -->
    <?= $this->renderSection('content'); ?>
    <!-- Akhir content -->


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <!-- Animate on Scroll .js -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Costum User Script.js -->
    <script type="text/javascript" src="js/script_user.js"></script>
    

    <script src="js/script.js"></script>
    
</body>

</html>