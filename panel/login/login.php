<?php
include("../../koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sahabat Petualang Adventure</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../../assets/img/sahabat.png" rel="icon">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form" action="" method="POST">
					<span class="login100-form-title p-b-43">
						Adventure Form Login
						<p>Silahkan Login, agar Anda dapat melakukan peminjaman alat.</p>
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					<input name="captcha" type="text">
<img src="captcha.php" /><br>

					<!-- <div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox"> 
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" title="Please Click Here" required/>
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>
					</div> -->

					<div class="container-login100-form-btn">
						<input type="submit" name="login_pembeli" class="login100-form-btn" value="LOGIN">
					</div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							<a href="../register/register.php">Belum Punya akun?</a>
						</span>
					</div>
<?php
if(isset($_POST['login_pembeli'])){session_start();

if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])
{

require_once("../../koneksi.php");
$username = $_POST['email'];
$password = md5($_POST['password']);

$cek_pengguna = mysqli_query($terhubung, "SELECT * FROM tbl_pembeli WHERE username = '$username' AND password = '$password'");
$jumlah = mysqli_num_rows($cek_pengguna);
$hasil = mysqli_fetch_array($cek_pengguna);
$pass = $hasil['password'];
if($jumlah == 0) {?>
<script type="text/javascript">
    alert('Akun anda belum terdaftar');
    document.location.href="login.php";
</script>
<?php
} else {
if($pass != $hasil['password']) {
?>
<script type="text/javascript">
    alert('Username atau Password Salah');
    document.location.href="login.php";
</script>
<?php
} else {
$_SESSION['nama_lengkap'] = $hasil['nama_lengkap'];
$_SESSION['pass'] = $hasil['password'];
?>
<script type="text/javascript">
    alert('Selamat Login Berhasil');
    document.location.href="../../beranda.php";
</script>
 
<?php
}
}
}
else
{
die("Wrong Captcha Code!");
}
}




?>
				</form>

				<div class="login100-more" style="background-image: url('images/sahabat.png');">
				</div>
			</div>
		</div>
	</div>	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>