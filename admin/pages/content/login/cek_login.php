<?php 
if(isset($_POST['login_admin'])){
session_start();
require_once("../../../../koneksi.php");
$username = $_POST['username'];
$password = md5($_POST['password']);

$cek_admin = mysqli_query($terhubung, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
$jumlah = mysqli_num_rows($cek_admin);
$hasil = mysqli_fetch_array($cek_admin);
$pass = $hasil['password'];
if($jumlah == 0) {?>
<script type="text/javascript">
    alert('Akun anda belum terdaftar');
    document.location.href="../content/login.php";
</script>
<?php
} else {
if($pass != $hasil['password']) {
?>
<script type="text/javascript">
    alert('Username atau Password Salah');
</script>
<?php
} else {
$_SESSION['nama_lengkap'] = $hasil['nama_lengkap'];
$_SESSION['pass'] = $hasil['password'];
?>
<script type="text/javascript">
    alert('Selamat Login Berhasil');
    document.location.href="../../../index.php";
</script>
<?php
}
}
}
?>