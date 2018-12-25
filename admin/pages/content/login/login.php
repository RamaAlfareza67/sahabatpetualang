<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Taxi Rental Form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- //for-mobile-apps -->
		<link href="../../../../img/buas.png" rel="icon">
		<style type="text/css">

			.avatar {
				vertical-align: middle;
				width: 120px;
				height: 120px;
				border-radius: 50%;
			}
		</style>
		<link href="../../../../assets/img/sahabat.png" rel="icon">
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<script src="js/jquery-1.12.0.min.js"></script>
		<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	</head>
	<body>
		<div class="main">
			<!-- <h1>Taxi Rental Form</h1> -->
			<div class="w3_agile_main_grids">
				<div class="agileits_w3layouts_main_grid">
					<form id="upload" action="cek_login.php" method="post" enctype="multipart/form-data">
						<h1><center>Login Admin</center></h1>
							<center><img src="../../../../assets/img/logo_spa.jpg" alt="Avatar" class="avatar"></center><br />
						<div class="agile_main_grid_left">
							<input type="text" placeholder="Username" name="username" required/>
							<input type="password" placeholder="Password" name="password" required/>
						</div>
						<div>
							<center><input type="submit" name="login_admin" value="Login"></center>
							<br /><br /><a href="../login/login.php"><font color="white">Lupa Password?</font></a>
						</form>
					</div>
				</div><br /><br />
				<div class="agile_main_grid_left">
					<p>© Copyright Adventure <?php
						$tgl=date('Y');
						echo $tgl;
						?> | All rights reserved
						<br />Design by </font><a href="https://www.facebook.com/kabut.waisnawe" style="text-decoration: none;" target="_blank"><font color="white"> Sahabat Petualang Adventure - Indramayu</font></a></p>
					</div>
				</div>
				<script src="js/filedrag.js"></script>
				<!-- start-date-piker-->
				<script src="js/jquery-ui.js"></script>
				<script>
					$(function() {
						$( "#datepicker,#datepicker1" ).datepicker();
					});
				</script>
				<!-- //End-date-piker -->
			</body>
			</html>