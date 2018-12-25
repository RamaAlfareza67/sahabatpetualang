<?php
include ("../../koneksi.php");
$id_produk 		= $_GET['id_produk'];
$id_category 	= $_GET['id_category'];
$id_keranjang	= $_GET['id_keranjang'];
$id_pembeli		= $_GET['id_pembeli'];
$qty 			= $_GET['qty'];

$query_hapus=mysqli_query($terhubung, "DELETE FROM tbl_keranjang where id_keranjang='$id_keranjang'");
if(!$query_hapus){
	header("location: ../../beranda.php?modul=panel/content&page=keranjang&id_produk=$id_produk&id_category=$id_category&id_pembeli=$id_pembeli");
}else{
	header("location: ../../beranda.php?modul=panel/content&page=keranjang&id_produk=$id_produk&id_category=$id_category&id_pembeli=$id_pembeli");
}
?>