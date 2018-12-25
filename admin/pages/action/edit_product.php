<?php
$id_produk = $_GET['id_produk'];
$terlihat = mysqli_query($terhubung, "SELECT id_produk, id_category, nama_produk, deskripsi, harga, stok_barang, gambar_produk FROM tbl_produk WHERE id_produk = '$id_produk'");
$view = mysqli_fetch_array($terlihat);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6" align="center">
          <h1>Produk Baru</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Produk</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-10">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Form Edit Produk Baru</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="" enctype="multipart/form-data">
              <div class="card-body">

               <div class="form-group">
                <label for="exampleInputPassword1">Kategori Produk</label><br>
                <select style="height: 40px;" name="kategori">
                  <option>- Pilih Kategori Produk -</option>
                  <?php
                  $query_z=mysqli_query($terhubung, "SELECT * FROM tbl_category order by nama_category DESC");
                  while($data_z=mysqli_fetch_array($query_z)){
                    echo "<option value='$data_z[id_category]'>$data_z[nama_category]</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" id="exampleInputEmail1" value="<?php echo "$view[nama_produk]"; ?>">
              </div>
              <div class="form-group">
               <label>Foto Produk</label><br />
               <input type="file" name="foto_produk" ></input>
             </div>
             <div class="form-group">
              <label for="exampleInputEmail1">Harga Rental/hari</label>
              <input type="text" name="harga" class="form-control" id="exampleInputEmail1" value="<?php echo "$view[harga]"; ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Stok Produk</label>
              <input type="text" name="stok_produk" class="form-control" id="exampleInputEmail1" value="<?php echo "$view[stok_barang]"; ?>">
            </div>
            <!-- textarea -->
            <div class="form-group">
              <label>Deskripsi Produk</label>
              <textarea class="form-control" name="ket_produk" rows="3" placeholder="Masukkan Deskripsi Produk"></textarea>
            </div>              
            <br />*Perhatian :
            <br />Jika ingin edit Produk, wajib masukkan kembali Deskripsi Produk.
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Saya Mengerti</label>
            </div>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer" align="center">
          <button type="submit" class="btn btn-primary" name="batal">Batalkan</button>&ensp;&ensp;
          <button type="submit" class="btn btn-primary" name="edit_new_produk" onclick="return confirm('Yakin ingin Mengedit?')">Edit Produk</button>
        </div>
        <?php
        if (isset($_POST['edit_new_produk'])) {
          $id_produk = $_GET['id_produk'];
          $category=$_POST['kategori'];
          $nama_produk = $_POST['nama_produk'];
          $harga = $_POST['harga'];
          $stok_produk = $_POST['stok_produk'];
          $ket_produk = $_POST['ket_produk'];
          $img_produk = $_FILES['foto_produk']['name'];
          $dapat = $_FILES['foto_produk']['tmp_name'];
          $konten = 'img/produk/';
          move_uploaded_file($dapat, $konten.$img_produk);

          $add_produk = mysqli_query ($terhubung, "UPDATE tbl_produk SET id_category='$category', nama_produk='$nama_produk', deskripsi='$ket_produk', harga='$harga', stok_barang='$stok_produk', gambar_produk='$img_produk' WHERE id_produk = '$id_produk'");

          if ($add_produk) {
            ?>
            <script type="text/javascript">
              alert('Edit data berhasil');
              document.location.href="index.php?modul=pages/content&page=product";
            </script>
            <?php
          } else {
            ?>
            <script type="text/javascript">
              alert('Edit data gagal');
            </script>
            <?php
          }
        } else if (isset($_POST['batal'])) {
          ?>
          <script type="text/javascript">
            document.location.href="index.php?modul=pages/content&page=product";
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