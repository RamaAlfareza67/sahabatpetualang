  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6" align="center">
            <h1>Akun Pembeli</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Akun Pembeli</li>
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
                <h3 class="card-title">Form Tambah Akun Pembeli</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" id="exampleInputEmail1" placeholder="Nama Lengkap">
                  </div>
                  <div class="form-group">
                   <label>Foto Pembeli</label><br />
                   <input type="file" name="foto_akun" ></input>
                 </div>
                 <div class="form-group">
                  <label for="exampleInputPassword1">Jenis Kelamin</label><br>
                  <select style="height: 40px;" name="jenis_kelamin">
                    <option>-Pilih Jenis Kelamin-</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kontak</label>
                  <input type="text" name="kontak" class="form-control" id="exampleInputPassword1" placeholder="Handphone / WhatsApp">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="text" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password"><br>
                  <!-- textarea -->
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat" rows="3" placeholder="Masukkan Alamat Akun Pembeli"></textarea>
                  </div>                  
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer" align="center">
                <button type="submit" class="btn btn-primary" name="batal">Batalkan</button>&ensp;&ensp;
                <button type="submit" class="btn btn-primary" name="add_new_akun" onclick="return confirm('Yakin ingin Menambah?')">Tambahkan</button>
              </div>
              <?php
              if (isset($_POST['add_new_akun'])) {
                $nama_lengkap = $_POST['nama_lengkap'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $kontak = $_POST['kontak'];
                $email = $_POST['email'];
                $password = md5($_POST['password']);
                $alamat = $_POST['alamat'];
                $img_pembeli = $_FILES['foto_akun']['name'];
                $dapat = $_FILES['foto_akun']['tmp_name'];
                $konten = 'img/pembeli/';
                move_uploaded_file($dapat, $konten.$img_pembeli);
                $add_akun = mysqli_query ($terhubung, "INSERT INTO tbl_pembeli (username, password, foto_pembeli, nama_lengkap, handphone, jenis_kelamin, alamat) VALUES ('$email', '$password', '$img_pembeli', '$nama_lengkap', '$kontak', '$jenis_kelamin', '$alamat')");
                if ($add_akun) {
                  ?>
                  <script type="text/javascript">
                    alert('Tambah data berhasil');
                    document.location.href="index.php?modul=pages/content&page=buyers_account";
                  </script>
                  <?php
                } else {
                  ?>
                  <script type="text/javascript">
                    alert('Tambah data gagal');
                  </script>
                  <?php
                }
              } else if (isset($_POST['batal'])) {
                ?>
                <script type="text/javascript">
                  document.location.href="index.php?modul=pages/content&page=buyers_account";
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