<?php
$id_produk 		= $_GET['id_produk'];
$id_category 	= $_GET['id_category'];
$id_keranjang	= $_GET['id_keranjang'];
$id_pembeli		= $_GET['id_pembeli'];
$qty 			= $_GET['qty'];

$edit_qty = mysqli_query($terhubung, "SELECT id_keranjang, id_produk, id_pembeli, tanggal_keranjang, jam_keranjang, qty FROM tbl_keranjang WHERE id_keranjang = '$id_keranjang'");
$view = mysqli_fetch_array($edit_qty);
?>

<br />
<!-- Main content -->
<section class="content" style="margin-left: 200px;">
	<div class="container-fluid">
		<div class="row">
			<!-- left column -->
			<div class="col-md-10">
				<!-- general form elements -->
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Form Edit Pemesanan (Qty)</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form role="form" method="post" action="" enctype="multipart/form-data">
						<div class="card-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Edit Qty</label>
								<input type="text" name="edit_kuantitas" class="form-control" id="exampleInputEmail1" value="<?php echo "$view[qty]"; ?>">
							</div>
						</div>
						<!-- /.card-body -->

						<div class="card-footer" align="center">
							<button type="submit" class="btn btn-primary" name="batal">Batalkan</button>&ensp;&ensp;
							<button type="submit" class="btn btn-primary" name="edit_pemesanan" onclick="return confirm('Yakin ingin Edit?')">Edit Qty</button>
						</div>
						<?php
						if (isset($_POST['edit_pemesanan'])) {
							$id_produk 		= $_GET['id_produk'];
							$id_category 	= $_GET['id_category'];
							$id_keranjang	= $_GET['id_keranjang'];
							$id_pembeli		= $_GET['id_pembeli'];
							$qty 			= $_GET['qty'];
							$edit = $_POST['edit_kuantitas'];

							$perbarui = mysqli_query($terhubung, "UPDATE tbl_keranjang SET qty='$edit' WHERE id_keranjang = '$id_keranjang'");

							if ($perbarui) {
								?>
								<script type="text/javascript">
									alert('Berhasil diperbarui');
									document.location.href="beranda.php?modul=panel/content&page=keranjang&id_produk=<?php echo "$id_produk"; ?>&id_category=<?php echo "$id_category" ?>&id_pembeli=<?php echo "$id_pembeli"; ?>";
								</script>
								<?php
							}else {
								?>
								<script type="text/javascript">
									alert('Gagal diperbarui');
								</script>
								<?php
							}
						}
						else if(isset($_POST['batal'])){
							?>
							<script type="text/javascript">
        // alert('Edit Data Berhasil');
        document.location.href="beranda.php?modul=panel/content&page=keranjang&id_produk=$id_produk&id_category=$id_category&id_pembeli=$id_pembeli";
    </script>
    <?php
}
?>
</form>
</div>
<!-- /.card -->
</div>
<!--/.col (left) -->
</div>
</div>
</section>
<br />
