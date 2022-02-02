<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> User Registration</title>

   <!-- Custom fonts for this template-->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('vendors/fontawesome-free/css/all.min.css'); ?>">
   <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="<?php echo base_url('css/sb-admin-2.css'); ?>">

</head>

<body>

    <div class="container-fluid" style="height: 100vh;">

    <div class="row justify-content-center">
        <div class="col-6" style="background-image: url(/img/bg-login.png); background-repeat: no-repeat"></div>

        <div class="col-6">
            <br>
            <br>
            <img src="/img/Logo Apps Twins Robo.png">
            <br>
            <br>
                    <div class="judul-login">
                        <style type="text/css">
                            .judul-login {
                                font-style: normal;
                                font-weight: 800;
                                font-size: 24px;
                                line-height: 19.5px;
                                color: #545454;
                        }
                        </style>
                        <h1 class="judul-login">Create an Account</h1>
                    </div>
            <div class="col-8 card o-hidden border-0 shadow-lg my-5"> 
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-17">
                            <div class="p-5">
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <h4>Periksa Entrian Form</h4>
                                        </hr />
                                        <?php echo session()->getFlashdata('error'); ?>
                                    </div>
                                <?php endif; ?>
                                <form method="post" action="<?php echo base_url('usrregister/process') ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username"
                                            placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nama_depan" name="nama_depan"
                                            placeholder="Nama Depan">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nama_belakang" name="nama_belakang"
                                            placeholder="Nama Belakang">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email"
                                            placeholder="Email Address">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user"
                                                id="password1" name="password1" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Register Account
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?php echo base_url('/login'); ?>">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('vendors/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('js/sb-admin-2.min.js'); ?>"></script>

</body>

</html>