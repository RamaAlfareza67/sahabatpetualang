<?php
$id_order = $_GET['id_order'];
$terlihat = mysqli_query($terhubung, "SELECT * FROM tbl_order_pemesan WHERE id_order = '$id_order'");
$view = mysqli_fetch_array($terlihat);
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6" align="center">
            <h1>Edit Status Pembayaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Status Pembayaran</li>
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
                <h3 class="card-title">Form Edit Status</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="" id="id_user" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Status Pembeli</label><br>
                    <select style="height: 40px; width: 130px;" name="statusnya">
                      <option value="<?php echo "$view[status_order]"; ?>"><?php echo "$view[status_order]"; ?></option>
                      <option value="Lunas">Lunas</option>
                      <option value="Belum Lunas">Belum Lunas</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer" align="center">
                  <button type="submit" class="btn btn-primary" name="batal">Batalkan</button>&ensp;&ensp;
                  <button type="submit" class="btn btn-primary" name="edit_kan" onclick="return confirm('Yakin ingin Mengedit?')">Edit Sekarang</button>
                </div>
                <?php
                if (isset($_POST['edit_kan'])) {
                  $id_order = $_GET['id_order'];
                  $status_order = $_POST['statusnya'];
                  $edit_status = mysqli_query ($terhubung, "UPDATE tbl_order_pemesan SET status_order='$status_order' WHERE id_order = '$id_order'");
                  if ($edit_status) {
                    ?>
                      <script type="text/javascript">
                        alert('Edit data berhasil');
                        document.location.href="index.php?modul=pages/content&page=tenant";
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
                        document.location.href="index.php?modul=pages/content&page=tenant";
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