<?php
$id_pembeli = $_GET['id_pembeli'];
$terlihat = mysqli_query($terhubung, "SELECT id_pembeli, username, password, foto_pembeli, nama_lengkap, handphone, jenis_kelamin, alamat FROM tbl_pembeli WHERE id_pembeli = '$id_pembeli'");
$view = mysqli_fetch_array($terlihat);
?>

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
            <li class="breadcrumb-item active">Edit Akun Pembeli</li>
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
              <h3 class="card-title">Form Edit Akun Pembeli</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Lengkap</label>
                  <input type="text" name="nama_lengkap" class="form-control" id="exampleInputEmail1" value="<?php echo "$view[nama_lengkap]"; ?>">
                </div>
                <div class="form-group">
                 <label>Foto Pembeli</label><br />
                 <input type="file" name="foto_akun" ></input>
               </div>
               <div class="form-group">
                <label for="exampleInputPassword1">Jenis Kelamin</label><br>
                <select style="height: 40px;" name="jenis_kelamin">
                  <option value="<?php echo "$view[jenis_kelamin]"; ?>"><?php echo "$view[jenis_kelamin]"; ?></option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Kontak</label>
                <input type="text" name="kontak" class="form-control" id="exampleInputPassword1" value="<?php echo "$view[handphone]"; ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="text" name="email" class="form-control" id="exampleInputPassword1" value="<?php echo "$view[username]"; ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Kembali Password"><br>
                <!-- textarea -->
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" rows="3" value="<?php echo "$view[alamat]"; ?>" ></textarea>
                </div>                  
                <br />*Perhatian :
                <br />Jika ingin edit akun, wajib masukkan kembali password dan alamat.
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Saya Mengerti</label>
                </div>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer" align="center">
              <button type="submit" class="btn btn-primary" name="batal">Batalkan</button>&ensp;&ensp;
              <button type="submit" class="btn btn-primary" name="edit_new_akun" onclick="return confirm('Yakin ingin Mengedit?')">Edit Akun</button>
            </div>
            <?php
            if (isset($_POST['edit_new_akun'])) {
              $id_pembeli = $_GET['id_pembeli'];
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
              $edit_akun = mysqli_query ($terhubung, "UPDATE tbl_pembeli SET username='$email', password='$password', foto_pembeli='$img_pembeli', nama_lengkap='$nama_lengkap', handphone='$kontak', jenis_kelamin='$jenis_kelamin', alamat='$alamat' WHERE id_pembeli='$id_pembeli'");
              if ($edit_akun) {
                ?>
                <script type="text/javascript">
                  alert('Edit data berhasil');
                  document.location.href="index.php?modul=pages/content&page=buyers_account";
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