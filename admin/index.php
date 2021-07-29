<!doctype html>
<html lang="en">
<head>
	<title>Admin Portofolio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../bootstrap/images/s.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../bootstrap/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../bootstrap/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../bootstrap/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../bootstrap/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/util.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../bootstrap/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" action="">
					<span class="login100-form-title">
						Login User
					</span>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
                    

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
                                            <button class="login100-form-btn" type="submit" name="submit">
							Login
						</button>
					</div>
					
				</form>
<?php
if (isset($_POST['submit'])) {
	include '../koneksi.php';
	$pass=md5($_POST['password']);

	$cek=mysqli_query($koneksi,"SELECT * FROM akun WHERE 
	username='$_POST[username]' AND password='$pass'");

	$data=mysqli_fetch_array($cek);
	$result=mysqli_num_rows($cek);
	if ($result==1) {
		session_start();
		$_SESSION['username']=$data['username'];
		echo "<script>top.location='home.php?page=home&username=$data[username]'</script>";
			}
	else {
		echo "<script>alert('Username and password invalid')</script>";
	}
	
}
?>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->	
	<script src="../bootstrap/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../bootstrap/vendor/bootstrap/js/popper.js"></script>
	<script src="../bootstrap/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../bootstrap/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../bootstrap/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="bootstrap/js/main.js"></script>

</body>
</html>
