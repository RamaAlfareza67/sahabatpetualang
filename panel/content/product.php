<?php
$id_category = $_GET['id_category'];
$query_category = mysqli_query($terhubung, "SELECT * FROM tbl_category WHERE id_category='$id_category'");
$data_category = mysqli_fetch_array($query_category);
?>
<section id="inner-headline" style="background-color: yellow; opacity: 0.5;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<br><center><h2><b><?php echo $data_category['nama_category']; ?></b></h2></center>
			</div>
		</div>
	</div>
</section>
<section id="portfolio"  class="section-bg" >
	<div class="container">
		<div class="row portfolio-container">
			<?php
  // Langkah 1. Tentukan batas,cek halaman & posisi data
			$batas   = 6;
			$halaman = (isset($_GET['hal'])) ? (int)$_GET['hal'] :1;
			if(empty($halaman)){
				$posisi  = 0;
				$halaman = 1;
			}
			else{ 
				$posisi  = ($halaman-1) * $batas;
			}
			$sql = mysqli_query($terhubung, "SELECT * FROM tbl_produk WHERE id_category = '$id_category' order by id_produk DESC LIMIT $posisi, $batas");
// Langkah 3: Hitung total data dan halaman serta link 1,2,3 
			$query2     = mysqli_query($terhubung, "SELECT * FROM tbl_produk");
			$jmldata    = mysqli_num_rows($query2);
			$jmlhalaman = ceil($jmldata/$batas);
			while ($tampil = mysqli_fetch_array($sql)) {
				?>
				<div class="col-lg-4 col-md-6 portfolio-item"><br /><br />
					<div class="portfolio-wrap "><center><b><?php echo "$tampil[nama_produk]"; ?></b></center>
						<figure>
							<img src="admin/img/produk/<?php echo "$tampil[gambar_produk]"; ?>" class="img-fluid" alt="">
							<a href="admin/img/produk/<?php echo "$tampil[gambar_produk]"; ?>" data-lightbox="portfolio" data-title="<?php echo "$tampil[nama_produk]"; ?>" class="link-preview" title="Lihat"><i class="ion ion-eye"></i></a>
						</figure>
						<div class="portfolio">
							<center>Rp <b><?php echo "$tampil[harga]"; ?>,-</b> &ensp;
							<a href="beranda.php?modul=panel/content&page=detail_produk&id_produk=<?php echo "$tampil[id_produk]"; ?>&id_category=<?php echo "$tampil[id_category]"; ?>" class="link-details" title="Pinjam"><img src="assets/img/keranjang.png" width="30" height="30"></a></center><br>
						</div>
					</div>
				</div>
				<?php
			}
			?>  
		</div>
		<br /><br /><br /><br />

		<!-- Star Pagination -->
		<div style="margin-left: 50px; margin-right: 50px;">
			<nav class="text-center">
				<ul class="pagination">
					<?php if($halaman==1){
						echo '<li><a href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>';
					}else{
						echo '<li><a href="beranda.php?modul=panel/content&page=product&hal=';echo $halaman -1 ;echo '&id_category=';echo "$data_category[id_category]";echo '" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>';
					}
					?>    
					<?php 
					for($x=1;$x<=$jmlhalaman;$x++){
						?>
						<li class="">
							<a href="beranda.php?modul=panel/content&page=product&id_category=<?php echo "$data_category[id_category]"; ?>&hal=<?php echo $x ?>"><?php echo $x ?></a>
						</li>
						<?php
					}
					?>
				</ul>
			</nav>
		</div>
		<!-- End Pagination -->

	</div>
</section>
