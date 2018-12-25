<?php 
if (isset($_POST['submit_peminjam'])) {
	include 'fungsi_waktu.php';
	include '../../koneksi.php';
	$nama_kategori = $_POST['kategorinya'];
	$nama_produk = $_POST['nama_produknya'];
	$qty = $_POST['jumlah_qty'];
	$id_pembeli=$_POST['id_pembeli'];
	$nama_order=$_POST['nama'];
	$email_order=$_POST['email'];
	$alamat_order=$_POST['alamat'];
	$kode_pos_order=$_POST['kode_pos'];
	$kontak_order=$_POST['kontak'];
	$jumlah_order=$_POST['jumlah'];
	$img_pembeli = $_FILES['foto_pembeli']['name'];
    $dapat = $_FILES['foto_pembeli']['tmp_name'];
    $konten = '../../admin/img/pembeli/';
    move_uploaded_file($dapat, $konten.$img_pembeli);

	$query_keranjang=mysqli_query($terhubung, "SELECT * FROM tbl_keranjang WHERE id_pembeli='$id_pembeli'");
 while($data_keranjang=mysqli_fetch_array($query_keranjang)){
    $query_produk=mysqli_query($terhubung, "SELECT * FROM tbl_produk WHERE id_produk='$data_keranjang[id_produk]' ");
    $data_produk=mysqli_fetch_array($query_produk);
    $stok=mysqli_query($terhubung, "UPDATE tbl_produk SET stok_barang=stok_barang-'$data_keranjang[qty]' WHERE id_produk='$data_keranjang[id_produk]' ");
}
	$query_tambah=mysqli_query($terhubung, "INSERT INTO tbl_order_pemesan (id_pembeli, nama_pembeli, nama_category, nama_produk, qty, foto_pembeli, email, alamat, kode_pos, kontak, harga_total, tanggal_order, jam_order, status_order) VALUES ('$id_pembeli', '$nama_order', '$nama_kategori', '$nama_produk', '$qty', '$img_pembeli', '$email_order', '$alamat_order', '$kode_pos_order', '$kontak_order', '$jumlah_order', '$tanggal_sekarang', '$jam_sekarang', 'Belum Lunas')");
	if (!$query_tambah) {
		?>
			<script type="text/javascript">
				alert('Peminjaman Gagal');
			</script>
		<?php
	}else{
		?>
			<script type="text/javascript">
				alert('Peminjaman Berhasil');
				document.location.href="../../beranda.php";
			</script>
		<?php
	}
}
 ?>