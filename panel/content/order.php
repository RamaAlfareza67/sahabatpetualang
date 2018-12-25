<?php
$nama_lengkap = $_SESSION['nama_lengkap'];
$sqlo     = mysqli_query ($terhubung, "SELECT * FROM tbl_pembeli WHERE nama_lengkap = '$nama_lengkap'");
$tampil  = mysqli_fetch_array($sqlo)
?>
<hr><center>
<h3>Form Peminjaman</h3>
</center>
<hr>
<div class="container">
  <form action="" method="POST" enctype="multipart/form-data">
    <table class="table table-bordered">
      <thead>
        <tr hidden="">
          <th width="20%">Nama</th>
          <td><input type="text" name="nama" class="form-control" value="<?php echo "$nama_lengkap"; ?>" required/>
          </td>
        </tr>
        <tr>
          <th width="20%">Nama Lengkap</th>
          <td><input type="text" name="nama_kamu" class="form-control" placeholder="Nama Lengkap" required/>
          </td>
        </tr>
        <tr>
          <th>Email</th>
          <td><input type="text" name="email" class="form-control" placeholder="Email"></td>
        </tr>
        <tr>
          <th>Alamat</th>
          <td><textarea name="alamat" class="form-control" cols="30" rows="10" placeholder="Alamat" required/></textarea></td>
        </tr>
        <tr>
          <td>Kode POS</td>
          <td><input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos" required/></td>
        </tr>
        <tr>
          <th>Kontak</th>
          <td><input type="text" name="kontak" class="form-control" placeholder="Hp / WhatsApp" required/></td>
        </tr>
        <tr>
          <th>Foto KTP / Identitas</th>
          <td><input type="file" name="foto_pembeli" required/></td>
        </tr>
        <tr>
          <th>Harga Total</th>
          <?php
          $jumlah_total=$_GET['jumlah_total'];
          ?>
          <td>Rp.<?php echo $jumlah_total; ?>.000,-</td>
          <input type="hidden" name="harga_total" value="<?php echo $jumlah_total; ?>">
          <input type="hidden" name="id_pembeli" value="<?php echo $id_pembeli; ?>" >
        </tr>
        <tr>
          <td colspan="4">
            <input type="submit" name="submit_peminjam" class="btn btn-primary" value="Order Sekarang" style="float:right" onclick="return confirm('Yakin ingin Order?')">
          </td>
        </tr>
      </thead>
    </table>
  </form>
</div>
<?php
if (isset($_POST['submit_peminjam'])) {
  include 'panel/content/fungsi_waktu.php';
  $id_pembeli = $_GET['id_pembeli'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $alamat = $_POST['alamat'];
  $kode_pos = $_POST['kode_pos'];
  $kontak = $_POST['kontak'];
  $transaksi_status = 'Belum Transaksi';
  $harga_total = $_POST['harga_total'];
  $img_pembeli = $_FILES['foto_pembeli']['name'];
  $dapat = $_FILES['foto_pembeli']['tmp_name'];
  $konten = 'admin/img/foto_pembeli/';
  move_uploaded_file($dapat, $konten.$img_pembeli);
  $query_keranjang=mysqli_query($terhubung, "SELECT * FROM tbl_keranjang where id_pembeli='$id_pembeli'");
  while($data_keranjang=mysqli_fetch_array($query_keranjang)){
    $query_produk=mysqli_query($terhubung, "SELECT * FROM tbl_produk where id_produk='$data_keranjang[id_produk]'");
    $data_produk=mysqli_fetch_array($query_produk);
    $query_category=mysqli_query($terhubung, "SELECT * FROM tbl_category where id_category='$data_produk[id_category]'");
    $data_category=mysqli_fetch_array($query_category); 
    $add_form = mysqli_query($terhubung, "INSERT INTO tbl_order_pemesan (nama_category, nama_produk, tanggal_order, jam_order, status_order, nama_lengkap, email, kode_pos, kontak, alamat, harga, harga_total, foto, qty, status_transaksi) VALUES
      ('$data_category[nama_category]', '$data_produk[nama_produk]', '$tanggal_sekarang', '$jam_sekarang', 'Belum Lunas', '$nama', '$email', '$kode_pos', '$kontak', '$alamat', '$data_produk[harga]', '$harga_total', '$img_pembeli', '$data_keranjang[qty]', '$transaksi_status')");
  }
  if ($add_form) {
    $query_delete_keranjang=mysqli_query($terhubung, "DELETE FROM tbl_keranjang where id_pembeli='$id_pembeli'");
    ?>
    <script type="text/javascript">
      alert('Terimah kasih sudah membeli');
      document.location.href="beranda.php?modul=panel/content&page=riwayat_transaksi";
    </script>
    <?php
  } else {
    ?>
    <script type="text/javascript">
      alert('Terjadi kesalahan pemijaman');
    </script>
    <?php
  }
}
?>