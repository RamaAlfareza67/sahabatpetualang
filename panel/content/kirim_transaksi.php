  <br />
  <br />
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="margin-left: 400px;">
      <div class="container-fluid">
        <div class="row mb-4">
          <div class="col-sm-8" align="center">
            <h1><center>Kirim Bukti Transaksi</center></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" style="margin-left: 200px;">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Kirim Bukti Transaksi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1"><b>Nama Lengkap</b></label>
                    <input type="text" name="namanya" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Lengkap">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1"><b>No. Handphone/WhatsApp</b></label>
                    <input type="text" name="kontak" class="form-control" id="exampleInputEmail1" placeholder="No. Handphone/WhatsApp">
                  </div>
                  <div class="form-group">
                   <label>Foto Struk Transfer</label><br />
                     <input type="file" name="foto_struk" ></input>
                 </div>
                  <div class="form-group">
                    <label><b>Keterangan</b></label>
                    <textarea class="form-control" name="keterangan" rows="3" placeholder="Masukkan Keterangan Transaksi"></textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer" align="center">
                  <button type="submit" class="btn btn-primary" name="batal">Batalkan</button>&ensp;&ensp;
                  <button type="submit" class="btn btn-primary" name="add_struk" onclick="return confirm('Yakin ingin Mengirim?')">Kirimkan</button>
                </div>
                <?php
                if (isset($_POST['add_struk'])) {
                  $namanya = $_POST['namanya'];
                  $kontak = $_POST['kontak'];
                  $keterangan = $_POST['keterangan'];
                  $img_pembeli = $_FILES['foto_struk']['name'];
                  $dapat = $_FILES['foto_struk']['tmp_name'];
                  $konten = 'admin/img/bukti_transaksi/';
                  move_uploaded_file($dapat, $konten.$img_pembeli);
                  $add_pembayaran = mysqli_query ($terhubung, "INSERT INTO tbl_transaksi (nama_lengkap, kontak, foto_transaksi, ket) VALUES ('$namanya', '$kontak', '$img_pembeli', '$keterangan')");
                  if ($add_pembayaran) {
                    ?>
                      <script type="text/javascript">
                        alert('Kirim Struk Transaksi berhasil');
                        document.location.href="beranda.php?modul=panel/content&page=riwayat_transaksi";
                      </script>
                    <?php
                  } else {
                    ?>
                      <script type="text/javascript">
                        alert('Kirim Struk Transaksi Gagal');
                      </script>
                    <?php
                  }
                } else if (isset($_POST['batal'])) {
                  ?>
                      <script type="text/javascript">
                        document.location.href="beranda.php?modul=panel/content&page=riwayat_transaksi";
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
    <br />