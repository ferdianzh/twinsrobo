<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin Premium Bootstrap Admin Dashboard Template</title>
  <!-- plugins:css -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet" media="all">
  <link rel="stylesheet" href="/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/vendors/iconfonts/ionicons/dist/css/ionicons.css">
  <link rel="stylesheet" href="/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="/vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="/css/style.css">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/css/shared/style.css">
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="/css/demo_1/style.css">
  <!-- End Layout styles -->
  <link rel="shortcut icon" href="/images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">
    <?= $this->include('parts/_topbar'); ?>
    <!-- partial -->
    <div class="page-body-wrapper row">
      <!-- partial:partials/_sidebar.html -->
      <div class="col-4">
        <?= $this->include('parts/_sidebar'); ?>
      </div>
      <div class="col-12 main">
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Main-->
            <?= $this->renderSection('section'); ?>
            <!-- End of Main-->
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?= $this->include('parts/_footer'); ?>
          <!-- partial -->
        </div>
      </div>
      <!-- partial -->
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <!-- <script>
    function dropdown() {
      collapse.classList.remove('show');
    }
  </script> -->
  <script src="https://kit.fontawesome.com/46f670f20d.js" crossorigin="anonymous"></script>
  <script src="/vendors/js/vendor.bundle.base.js"></script>
  <script src="/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="/js/shared/off-canvas.js"></script>
  <script src="/js/shared/misc.js"></script>
  <script src="/js/script.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- <script src="/js/demo_1/dashboard.js"></script> -->
  <!-- End custom js for this page-->
  <!-- <script src="/js/shared/jquery.cookie.js" type="text/javascript"></script> -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
</body>

</html>