<section id="inner-headline" style="background-color: yellow; opacity: 0.5;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<br><center><h2><b>Category Of All Products</b></h2></center>
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
			else { 
				$posisi  = ($halaman-1) * $batas;
			}
			$sql = mysqli_query($terhubung, "SELECT * FROM tbl_produk order by id_produk DESC LIMIT $posisi, $batas");
		// Langkah 3: Hitung total data dan halaman serta link 1,2,3 
			$query2     = mysqli_query($terhubung, "SELECT * FROM tbl_produk");
			$jmldata    = mysqli_num_rows($query2);
			$jmlhalaman = ceil($jmldata/$batas);
			while ($tampil = mysqli_fetch_array($sql)) {
				?>
				<div class="col-lg-4 col-md-8 portfolio-item"><br /><br />
					<div class="portfolio-wrap"><center><b><?php echo "$tampil[nama_produk]"; ?></b></center>
						<figure>
							<img src="admin/img/produk/<?php echo "$tampil[gambar_produk]"; ?>" class="img-fluid" alt="">
							<a href="admin/img/produk/<?php echo "$tampil[gambar_produk]"; ?>" data-lightbox="portfolio" data-title="<?php echo "$tampil[nama_produk]"; ?>" class="link-preview" title="Lihat"><i class="ion ion-eye"></i></a>
							<!-- <a href="beranda.php" onclick="return confirm('Silahkan Login Untuk Peminjaman')" class="link-details" title="Pinjam"><i class="icon ion-ios-cart"></i></a> -->
						</figure>
						<div class="portfolio">
							<center>Rp <b><?php echo "$tampil[harga]"; ?>,-</b> &ensp;
								<a href="beranda.php" onclick="return confirm('Silahkan Login Untuk Pembelian')" class="link-details" title="Beli"><img src="assets/img/keranjang.png" width="30" height="30"></a></center><br>
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
							echo '<li><a href="index.php?modul=panel/content&page=beranda&hal=';echo $halaman - 1 ;echo '" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>';
						}
						?>    
						<?php 
						for($x=1;$x<=$jmlhalaman;$x++){
							?>
							<li class="">
								<a href="index.php?modul=panel/content&page=beranda&hal=<?php echo $x ?>"><?php echo $x ?></a>
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