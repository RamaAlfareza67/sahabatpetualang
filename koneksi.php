<?php
$dbname		= "adventure";
$host		= "localhost";
$username	= "root";
$password	= "";
$terhubung = mysqli_connect ($host, $username, $password, $dbname);
if (mysqli_connect_errno()) {
	echo "koneksi ke server database gagal";
	exit();
}
?>