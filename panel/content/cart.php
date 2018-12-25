<?php
include "../../koneksi.php";
include "fungsi_waktu.php";
$id_category = $_GET['id_category'];
$input=$_GET['input'];
$id_pembeli=$_GET['id_pembeli'];
$id_produk=$_GET['id_produk'];
if($input=="add"){
	$query=mysqli_query($terhubung, "SELECT id_produk from tbl_keranjang where id_produk='$id_produk' and id_pembeli='$id_pembeli'");
	$cek=mysqli_num_rows($query);
	if($cek==0){
		mysqli_query($terhubung, "INSERT INTO tbl_keranjang (id_produk, id_pembeli, tanggal_keranjang, jam_keranjang, qty) VALUES ('$id_produk','$id_pembeli', '$tanggal_sekarang', '$jam_sekarang', '1')");
	}else{
		mysqli_query($terhubung, "UPDATE tbl_keranjang SET qty=qty+1 where id_pembeli ='$id_pembeli' and id_produk='$id_produk'");
	}
		header("location: ../../beranda.php?modul=panel/content&page=detail_produk&id_produk=$id_produk");
	
}elseif($input=="detail_add"){
	$query_detail=mysqli_query($terhubung, "SELECT id_produk from tbl_keranjang where id_produk='$id_produk' and id_pembeli ='$id_pembeli'");
	$cek_detail=mysqli_num_rows($query_detail);
	if($cek_detail==0){
		mysqli_query($terhubung, "INSERT INTO tbl_keranjang(id_produk, id_pembeli, tanggal_keranjang, jam_keranjang, qty) VALUES ('$id_produk','$id_pembeli', '$tanggal_sekarang', '$jam_sekarang', '1')");
	}else{
		mysqli_query($terhubung, "UPDATE tbl_keranjang SET qty=qty+1 where id_pembeli='$id_pembeli' and id_produk='$id_produk'");
	}
	 	header("location: ../../beranda.php?modul=panel/content&page=keranjang&id_produk=$id_produk&id_category=$id_category&id_pembeli=$id_pembeli");
}

?>