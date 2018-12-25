<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sahabat Petualang Adventure</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- Favicon and touch icons -->
        <link href="../../assets/img/sahabat.png" rel="icon">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Adventure</strong> Register Form</h1>
                            <div class="description">
                            	<p>
	                            	Silahkan Daftar, agar Anda dapat Login.
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h1><b>Register</b></h1>
                            		<p>Isi form dibawah ini</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form action="" method="post">
			                    	<div class="form-group">
			                    		<label>Email</label>
			                        	<input type="email" name="username" placeholder="Email" class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label>Password</label>
			                        	<input type="password" name="kata_sandi" placeholder="Password" class="form-password form-control" id="form-password">
			                        </div>
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="form-username form-control" id="form-username">
                                    </div>
                                    <div class="form-group">
                                        <label>No. HP / WhatsApp</label>
                                        <input type="text" name="handphone" placeholder="No. HP / WhatsApp" class="form-username form-control" id="form-username">
                                    </div>
                        <div class="form-group">
                            <select style="height: 50px; width: 40%; background-color: black; text-align: center; color: white;" class="form-control" name="jenis_kelamin">
                                <option>- Pilih Jenis Kelamin -</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat" rows="3" placeholder="Masukkan Alamat"></textarea>
                 </div>
                                    <center><input type="submit" class="btn btn-primary" name="batalkan" value="BATAL" style="width: 100px;">&ensp;
                                    <input type="submit" class="btn btn-primary" name="daftar_sekarang" value="DAFTAR" style="width: 100px;"></center>
<?php
include("../../koneksi.php");
if (isset($_POST['daftar_sekarang'])) {
    $username = $_POST['username'];
    $kata_sandi = md5($_POST['kata_sandi']);
    $nama_lengkap = $_POST['nama_lengkap'];
    $handphone = $_POST['handphone'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];

    $reg = mysqli_query($terhubung, "INSERT INTO tbl_pembeli (username, password, nama_lengkap, handphone, jenis_kelamin, alamat) VALUES ('$username', '$kata_sandi', '$nama_lengkap', '$handphone', '$jenis_kelamin', '$alamat')");
    if ($reg) {
        ?>
            <script type="text/javascript">
                alert('Daftar Berhasil');
                document.location.href="../login/login.php";
            </script>
        <?php
    }
    else {
         ?>
            <script type="text/javascript">
                // alert('Daftar Gagal');
            </script>
        <?php
    }
} else if (isset($_POST['batalkan'])) {
        ?>
            <script type="text/javascript">
                document.location.href="../../index.php";
            </script>
        <?php
}
?>
			                    </form>
                <div class="footer-social">
                   <h4><a href="../login/login.php"><font color="blue" size="3">Sudah Punya Akun?</font></a></h4>
                </div>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>