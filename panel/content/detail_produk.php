<br />
<hr>
<center><font size="7" face="times new roman">Pinjam Alat</font></center>
<hr>
<div class="container">
 <link href="magiczoom.css" rel="stylesheet" type="text/css" media="screen"/>
        <!-- link to magiczoom.js file -->
        <script src="magiczoom.js" type="text/javascript"></script>
<?php
$id_produk=$_GET['id_produk'];
include "panel/content/fungsi_rupiah.php";
$query_detail=mysqli_query($terhubung, "SELECT id_produk, id_category, nama_produk, deskripsi, harga, stok_barang, gambar_produk FROM tbl_produk WHERE id_produk='$id_produk'");
$data_detail=mysqli_fetch_array($query_detail);
$harga=format_rupiah($data_detail['harga']);
?>

  <table class="table table-bordered">
  <tr>
  <th width="20%" height="10%" rowspan="6" ><a target="_blank" href="admin/img/produk/<?php echo "$data_detail[gambar_produk]"; ?>"  class="MagicZoom" rel="zoom-id:zoom;opacity-reverse:true; "><img src="admin/img/produk/<?php echo "$data_detail[gambar_produk]"; ?>" alt="" width="100%" class="img-responsive"  ></a></th>
  </tr>
  <tr>
  <th colspan="2"><?php echo "$data_detail[nama_produk]"; ?></th>
  </tr>
  <tr>
  <th width="10%">Harga Sewa</th>
  <td width="20%">Rp.<?php echo $harga; ?>.000,- /Hari</td>
  </tr>
  <tr>
  <th>STOK</th>
  <td><?php echo "$data_detail[stok_barang]"; ?></td>
  </tr>
  <tr>
  <th>Deskripsi</th>
  <td><?php echo "$data_detail[deskripsi]"; ?></td>
  </tr>
  <tr>
  <td colspan="3">
  <a href="panel/content/cart.php?input=detail_add&id_produk=<?php echo "$data_detail[id_produk]"; ?>&id_pembeli=<?php echo $id_pembeli; ?>&id_category=<?php echo "$data_detail[id_category]"; ?>" class="edit-record btn btn-primary">Add to Cart</a>

  <br />
  <br />
  *Perhatian :
  <br />
  Jika sudah, silahkan klik keranjang diatas untuk melakukan Check Out atau
  <br />
  Kembali jika anda ingin melakukan penyewaan lagi.
  </td>
  </tr>
  </table>
    </div> 

<?php
  $sq = mysqli_query($terhubung, "SELECT * FROM tbl_category WHERE id_category='$data_detail[id_category]'");
  $lihat = mysqli_fetch_array($sq);
?>

<br />
<hr>
<font size="7" face="times new roman" style="margin-left: 120px;">Testimoni <?php echo "$data_detail[nama_produk]"; ?></font>
<hr>
<form action="" method="post" enctype="multipart/form-data">
  <div style="margin-left: 120px;">Testimoni yang anda kirimkan, bermanfaat untuk kebaikan kami.</div><br />
  <div class="form-group" style="margin-left: 120px; margin-right: 800px;">
  <label><b>Nama Komentar</b></label>
    <input type="text" class="form-control" name="nama_komentar" placeholder="Nama Komentar" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
    <div class="validation"></div>
  </div>

  <div class="form-group" style="margin-left: 120px; margin-right: 800px;" hidden="">
    <input type="text" class="form-control" name="id_category" value="<?php echo "$lihat[id_category]"; ?>" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
    <div class="validation"></div>
  </div>

  <div class="form-group" style="margin-left: 120px; margin-right: 800px;">
  <label><b>No. Handphone/WhatsApp</b></label>
    <input type="text" class="form-control" name="kontak" placeholder="No. Handphone/WhatsApp" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
    <div class="validation"></div>
  </div>

  <div class="form-group" style="margin-left: 120px; margin-right: 800px;">
  <label><b>Email</b></label>
    <input type="email" class="form-control" name="email" placeholder="Email" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
    <div class="validation"></div>
  </div>
  <div class="form-group" style="margin-left: 120px; margin-right: 800px;">
  <label><b>Isi Komentar</b></label>
    <textarea class="form-control" name="isi_komentar" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Isi Komentar"></textarea>
    <div class="validation"></div>
  </div>
  <input class="edit-record btn btn-primary" type="submit" value="KIRIM TESTIMONI" name="kirim_testimoni" style="margin-left: 280px;" onclick="return confirm('Yakin Kirim Testimoni?')">
  <?php
  if (isset($_POST['kirim_testimoni'])) {
    $id_produk = $_GET['id_produk'];
    $id_category = $_POST['id_category'];
    $nama_komentar = $_POST['nama_komentar'];
    $kontak = $_POST['kontak'];
    $email = $_POST['email'];
    $isi_komentar = $_POST['isi_komentar'];
    $add_testimoni = mysqli_query($terhubung, "INSERT INTO tbl_testimoni (id_produk, id_category, nama_komentar, kontak, email, isi_komentar) VALUES ('$id_produk', '$id_category','$nama_komentar', '$kontak','$email', '$isi_komentar')");
    if ($add_testimoni) {
      ?>
      <script type="text/javascript">
        alert('Testimoni Terkirim');
      </script>
      <?php
    } else {
      ?>
      <script type="text/javascript">
        alert('Gagal Terkirim');
      </script>
      <?php
    }
  }
  ?>
</form>
<br /><br />

