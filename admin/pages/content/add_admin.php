  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6" align="center">
            <h1>Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Admin</li>
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
                <h3 class="card-title">Form Tambah Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Admin</label>
                    <input type="text" name="nama_admin" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Admin">
                  </div>
                  <div class="form-group">
                   <label>Foto Admin</label><br />
                   <input type="file" name="foto_admin" ></input>
                 </div>
                 <div class="form-group">
                  <label for="exampleInputPassword1">Jenis Kelamin</label><br>
                  <select style="height: 40px;" name="jk">
                    <option>- Pilih Jenis Kelamin -</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Agama</label><br>
                  <select style="height: 40px;" name="agama">
                    <option>- Pilih Agama -</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Konghucu">Konghucu</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Username</label>
                  <input type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Username">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Kata Sandi">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Konfirmasi Password</label>
                  <input type="password" name="re-password" class="form-control" id="exampleInputPassword1" placeholder="Konfirmasi Kata Sandi">
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" rows="3" placeholder="Masukkan Alamat Admin"></textarea>
                </div>                  
              </div>
              <!-- /.card-body -->

              <div class="card-footer" align="center">
                <button type="submit" class="btn btn-primary" name="batal">Batalkan</button>&ensp;&ensp;
                <button type="submit" class="btn btn-primary" name="add_administrator" onclick="return confirm('Yakin ingin Menambah?')">Tambahkan</button>
              </div>
              <?php
              if (isset($_POST['add_administrator'])) {
                $nama_admin = $_POST['nama_admin'];
                $jenis_kelamin = $_POST['jk'];
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                $alamat = $_POST['alamat'];
                $religion = $_POST['agama'];
                $img_admin = $_FILES['foto_admin']['name'];
                $dapat = $_FILES['foto_admin']['tmp_name'];
                $konten = 'user/foto_admin/';
                move_uploaded_file($dapat, $konten.$img_admin);
                $add_admin = mysqli_query ($terhubung, "INSERT INTO admin (nama_lengkap, username, password, jenis_kelamin, agama, alamat, foto) VALUES ('$nama_admin', '$username', '$password', '$jenis_kelamin', '$religion', '$alamat', '$img_admin')");
                if ($add_admin) {
                  ?>
                  <script type="text/javascript">
                    alert('Tambah data berhasil');
                    document.location.href="index.php?modul=pages/content&page=admin";
                  </script>
                  <?php
                } else {
                  ?>
                  <script type="text/javascript">
                    alert('Tambah data gagal');
                    document.location.href="index.php?modul=pages/content&page=add_admin";
                  </script>
                  <?php
                }
              } else if (isset($_POST['batal'])) {
                ?>
                <script type="text/javascript">
                  document.location.href="index.php?modul=pages/content&page=admin";
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