<?php
$id_category = $_GET['id_category'];
$terlihat = mysqli_query($terhubung, "SELECT id_category, nama_category FROM tbl_category WHERE id_category = '$id_category'");
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
              <li class="breadcrumb-item active">Add Produk</li>
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
                <h3 class="card-title">Form Tambah Kategori</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Kategori</label>
                    <input type="text" name="nama_category" class="form-control" id="exampleInputEmail1" value="<?php echo "$view[nama_category]"; ?>">
                  </div>

                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Saya Mengerti</label>
                  </div>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer" align="center">
                  <button type="submit" class="btn btn-primary" name="batal">Batalkan</button>&ensp;&ensp;
                  <button type="submit" class="btn btn-primary" name="edit_new_category" onclick="return confirm('Yakin ingin Menambah?')">Edit Category</button>
                </div>

                <?php
                if (isset($_POST['edit_new_category'])) {
                  $id_category = $_GET['id_category'];
                  $nama_category = $_POST['nama_category'];
                  $edit_category = mysqli_query ($terhubung, "UPDATE tbl_category SET nama_category='$nama_category' WHERE id_category = '$id_category'");
                  if ($edit_category) {
                    ?>
                      <script type="text/javascript">
                        alert('Edit data berhasil');
                        document.location.href="index.php?modul=pages/content&page=category";
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
                        document.location.href="index.php?modul=pages/content&page=category";
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