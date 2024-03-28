<?php require_once("../koneksi.php");
    if (!isset($_SESSION)) {
        session_start();

       
  if($_SESSION['level']==""){
    header("location:../login.php?pesan=gagal");
  } 
    } 


    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>XYZ Hotel</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="assets/image/png" href="assets/images/icons/logo.ico"/>
<!--===============================================================================================-->

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link href="../assets/vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/main.css">

<!--===============================================================================================-->
<style>
		.container-login100 {
			background-color: white;
		}
	</style>
</head>
<body><?php include 'navbar.php' ?>
	
	<?php 

		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Register Gagal !</div>";
		}
	}
	?>

	<div class="limiter">
		<div class="container-login100">
				<form class="login100-form validate-form" action="prosesregisADM.php" method="post">
					<span class="login100-form-title">
						Daftar Staff
					</span>

					<div class="wrap-input100 validate-input" >
						<input type="text" name="nama" class="input100" placeholder="Nama" required="required">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" >
						<input type="text" name="username" class="input100" placeholder="Username" required="required">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input type="password" name="password" class="input100" placeholder="Password" required="required">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input type="text" name="phone" class="input100" placeholder="Phone" required="required">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>

					
					
					<div class="container-login100-form-btn">
						<button type="submit" name="submit" class="login100-form-btn">
							Register
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	<footer class="foot">
<div class="footer-bottom">
            <p>&copy; 2023 Your Company. All rights reserved.</p>
          </div>
</footer>
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="assets/js/main.js"></script>

</body>
</html>
