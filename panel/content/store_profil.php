<br />
<div style="background-color: #ADFF2F; margin-left: 30px; margin-right: 30px;">
  <div style="margin-left: 50px;">
   <br><br><br><h1><font face="times new roman">Profil Toko</font></h1>
   <div class="bingkai_toko">
     <img src="assets/img/pendaki.png" width="100%" height="100%">
   </div>
 </div>
 <div style="margin-left: 50px; margin-right: 40px; text-align: justify-all;">
  <h3><font face="times new roman" size="4">
    Klik pada tombol Beli pada produk yang ingin Anda pesan.
    Produk yang Anda pesan akan masuk ke dalam Keranjang Belanja. Anda dapat melakukan perubahan jumlah produk yang diinginkan dengan mengganti angka di kolom Jumlah, kemudian klik tombol Update. Sedangkan untuk menghapus sebuah produk dari Keranjang Belanja, klik tombol Kali yang berada di kolom paling kanan.
    Jika sudah selesai, klik tombol Selesai Belanja, maka akan tampil form untuk pengisian data kustomer/pembeli.
    Setelah data pembeli selesai diisikan, klik tombol Proses, maka akan tampil data pembeli beserta produk yang dipesannya (jika diperlukan catat nomor ordernya). Dan juga ada total pembayaran serta nomor rekening pembayaran.
    Apabila telah melakukan pembayaran, maka produk/barang akan segera kami kirimkan.
  </font></h3>
</div><br><br><br>
</div>

<section id="portfolio"  class="section-bg" >
  <div class="container">

    <div class="section">
      <h3 style="text-align: center;"><b>Admin dan Pemilik Toko</b></h3>
      <!-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p> -->
    </div>

    <div class="row portfolio-container">
      <?php
  // Langkah 1. Tentukan batas,cek halaman & posisi data
      $batas   = 3;
      $halaman = (isset($_GET['hal'])) ? (int)$_GET['hal'] :1;
      if(empty($halaman)){
        $posisi  = 0;
        $halaman = 1;
      }
      else{ 
        $posisi  = ($halaman-1) * $batas;
      }
      $sql = mysqli_query($terhubung, "SELECT * FROM tbl_spa LIMIT $posisi, $batas");
// Langkah 3: Hitung total data dan halaman serta link 1,2,3 
      $query2     = mysqli_query($terhubung, "SELECT * FROM tbl_spa");
      $jmldata    = mysqli_num_rows($query2);
      $jmlhalaman = ceil($jmldata/$batas);
      while ($tampil = mysqli_fetch_array($sql)) {
        ?>
        <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
          <div class="portfolio-wrap">
            <figure>
              <img src="admin/user/foto_spa/<?php echo "$tampil[foto]"; ?>" class="img-fluid" alt="">
              <a href="admin/user/foto_spa/<?php echo "$tampil[foto]"; ?>" data-lightbox="portfolio" data-title="<?php echo "$tampil[nama]"; ?>" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
              <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
            </figure>

            <div class="portfolio-info">
              <h4><?php echo "$tampil[nama]"; ?></h4>
              <p><?php echo "$tampil[alamat]"; ?></p>
            </div>
          </div>
        </div>
        <?php
      }
      ?>  

      <!-- Star Pagination -->
    </div>
    <div style="margin-left: 50px; margin-right: 50px;">
      <nav class="text-center">
        <ul class="pagination">
         <?php if($halaman==1){
          echo '<li><a href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>';
        }else{
          echo '<li><a href="beranda.php?modul=panel/content&page=store_profil&hal=';echo $halaman -1 ;echo '" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>';
        }
        ?>    
        <?php 
        for($x=1;$x<=$jmlhalaman;$x++){
          ?>
          <li class="">
            <a href="beranda.php?modul=panel/content&page=store_profil&hal=<?php echo $x ?>"><?php echo $x ?></a>
          </li>
          <?php
        }
        ?>
      </ul>
    </nav>
  </div>
  <!-- End Pagination -->

</div>
</section><!-- #portfolio -->
