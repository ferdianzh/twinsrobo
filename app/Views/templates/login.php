<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="/img/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendors/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendors/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendors/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendors/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendors/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendors/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="shortcut icon" href="/images/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="/css/util.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<!--===============================================================================================-->
</head>

<body style="background-color: #666666;">

	<div class="limiter">
		<div class="container-login100">
			<div class="login100-img" style="background-image: url('/img/bg-login.png');"></div>
			<div class="login100-more">
				<img src="/img/Logo Apps Twins Robo.png" alt="">
				<h1 class="login100-form-title p-b-43">
						Admin Login
				</h1>
				<form class="login100-form validate-form" action="/login/auth" method="post">

					<div class="form-group">
						<label for="exampleInputEmail1">Email address</label>
						<input type="email" class="form-control mt-2 mb-2 input-login<?= ($validation->hasError('email') || session()->getFlashdata('email')) ? ' is-invalid' : ''; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
						<div class="invalid-feedback">
							<?= ($validation->hasError('email')) ? $validation->getError('email') : ''; ?>
							<?= (session()->getFlashdata('email')) ? session()->getFlashdata('email') : ''; ?>
						</div>
					</div>


					<div class="form-group mt-2">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control mt-2 mb-2 input-login<?= ($validation->hasError('password') || session()->getFlashdata('password')) ? ' is-invalid' : ''; ?>" id="password" name="password">
						<div class="invalid-feedback">
							<?= ($validation->hasError('password')) ? $validation->getError('password') : ''; ?>
							<?= (session()->getFlashdata('password')) ? session()->getFlashdata('password') : ''; ?>
						</div>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Show Password
							</label>
						</div>
					</div>


					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" value="Login">
					</div>
				</form>

				
			</div>
		</div>
	</div>





	<!--===============================================================================================-->
	<script src="/vendors/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="/vendors/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="/vendors/vendor/bootstrap/js/popper.js"></script>
	<script src="/vendors/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="/vendors/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="/vendors/vendor/daterangepicker/moment.min.js"></script>
	<script src="/vendors/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="/vendors/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="/js/main.js"></script>

</body>

</html>