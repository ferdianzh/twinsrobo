<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Login </title>

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

        <!-- Outer Row -->
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
                        <h1 class="judul-login">Let's Begin</h1>
                    </div>
                <div class="col-8 card o-hidden border-0 shadow-lg my-5"> 
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <h4></h4>
                                            </hr />
                                            <?php echo session()->getFlashdata('error'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <form method="post" action="<?php echo base_url('usrlogin/process') ?>">
                                        <div class="form-group">
                                            <label for="Email"><b>Email Address</b></label>
                                            <input type="email" class="form-control form-control-user"
                                                id="email" name="email" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group">
                                        <label for="uname"><b>Password</b></label>
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="w-100 btn btn-primary active">Masuk</button>
                                        <hr>
                                        <button type="submit" class="w-100 btn btn-info active" color="cyan">Lupa Password</button>
                                        <hr>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('/registration'); ?>">Create an Account!</a>
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