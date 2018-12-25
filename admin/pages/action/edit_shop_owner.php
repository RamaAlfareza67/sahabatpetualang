<?php
$id_spa = $_GET['id_spa'];
$terlihat = mysqli_query($terhubung, "SELECT id_spa, nama, alamat, foto FROM tbl_spa WHERE id_spa = '$id_spa'");
$view = mysqli_fetch_array($terlihat);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6" align="center">
          <h1>Pemilik Toko</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Pemilik Toko</li>
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
              <h3 class="card-title">Form Edit Pemilik Toko</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Pemilik Toko</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" value="<?php echo "$view[nama]"; ?>">
                </div>
                <div class="form-group">
                 <label>Foto Pemilik Toko</label><br />
                 <input type="file" name="foto_spa" ></input>
               </div>
               <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" rows="3" placeholder="Masukkan Kembali Alamat Pemilik Toko"></textarea>
              </div> 
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Saya Mengerti</label>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer" align="center">
              <button type="submit" class="btn btn-primary" name="batal">Batalkan</button>&ensp;&ensp;
              <button type="submit" class="btn btn-primary" name="edit_lah_pengurus" onclick="return confirm('Yakin ingin Mengedit?')">Edit Sekarang</button>
            </div>
            <?php
            if (isset($_POST['edit_lah_pengurus'])) {
              $id_spa = $_GET['id_spa'];
              $nama = $_POST['nama'];
              $alamat = $_POST['alamat'];
              $img_spa = $_FILES['foto_spa']['name'];
              $dapat = $_FILES['foto_spa']['tmp_name'];
              $konten = 'user/foto_spa/';
              move_uploaded_file($dapat, $konten.$img_spa);

              $add_struktur = mysqli_query ($terhubung, "UPDATE tbl_spa SET nama ='$nama', alamat='$alamat', foto='$img_spa' WHERE id_spa ='$id_spa'");
              if ($add_struktur) {
                ?>
                <script type="text/javascript">
                  alert('Edit data berhasil');
                  document.location.href="index.php?modul=pages/content&page=shop_owner";
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
                document.location.href="index.php?modul=pages/content&page=shop_owner";
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