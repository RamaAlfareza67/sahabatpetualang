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
              <li class="breadcrumb-item active">Add Pemilik Toko</li>
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
                <h3 class="card-title">Form Tambah Pemilik Toko</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Pemilik Toko</label>
                    <input type="text" name="nama_spa" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Pemilik Toko">
                  </div>
                  <div class="form-group">
                   <label>Foto Pemilik Toko</label><br />
                     <input type="file" name="foto_spa" ></input>
                 </div>
                 <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" rows="3" placeholder="Masukkan Alamat Pemilik Toko"></textarea>
                </div>                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer" align="center">
                  <button type="submit" class="btn btn-primary" name="batal">Batalkan</button>&ensp;&ensp;
                  <button type="submit" class="btn btn-primary" name="add_spa" onclick="return confirm('Yakin ingin Menambah?')">Tambahkan</button>
                </div>
                <?php
                if (isset($_POST['add_spa'])) {
                  $nama_spa = $_POST['nama_spa'];
                  $alamat = $_POST['alamat'];
                  $img_spa = $_FILES['foto_spa']['name'];
                  $dapat = $_FILES['foto_spa']['tmp_name'];
                  $konten = 'user/foto_spa/';
                  move_uploaded_file($dapat, $konten.$img_spa);

                  $add_struktur = mysqli_query ($terhubung, "INSERT INTO tbl_spa (nama, alamat, foto) VALUES ('$nama_spa', '$alamat', '$img_spa')");

                  if ($add_struktur) {
                    ?>
                      <script type="text/javascript">
                        alert('Tambah data berhasil');
                        document.location.href="index.php?modul=pages/content&page=shop_owner";
                      </script>
                    <?php
                  } else {
                    ?>
                      <script type="text/javascript">
                        alert('Tambah data gagal');
                        document.location.href="index.php?modul=pages/content&page=add_shop_owner";
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
    </section>