<!DOCTYPE html>
<html>
<head>
  <title>Sahabat Petualang Adventure</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<head>
  <title></title>
  
</head>
<body>

<?php
$nama_lengkap = $_SESSION['nama_lengkap'];
$sqlo     = mysqli_query ($terhubung, "SELECT * FROM tbl_pembeli WHERE nama_lengkap = '$nama_lengkap'");
$tampil  = mysqli_fetch_array($sqlo)
?>
<br />
<br />
<div class="container bootstrap snippet">
<form role="form" method="post" action="" enctype="multipart/form-data">
    <div class="row">
      <div class="col-sm-10"><h1><?php echo $_SESSION['nama_lengkap']; ?></h1></div>
      <div class="col-sm-2"></div>
    </div>
    <div class="row">
      <div class="col-sm-3"><!--left col-->
      <div class="text-center">
        <a href="admin/img/pembeli/<?php echo "$tampil[foto_pembeli]"; ?>" target="_blank"><img src="admin/img/pembeli/<?php echo "$tampil[foto_pembeli]"; ?>" class="avatar img-circle img-thumbnail" alt="avatar"></a>
        <h6>Upload Foto Lain</h6>
        <input type="file" name="foto_baru" class="text-center center-block file-upload" required/>
      </div></hr>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit" name="edit_foto">Simpan Foto</button>
                            </div>
                      </div>
              <?php
                if (isset($_POST['edit_foto'])) {
                  $nama_lengkap = $_SESSION['nama_lengkap'];
                  $img_user = $_FILES['foto_baru']['name'];
                  $dapat = $_FILES['foto_baru']['tmp_name'];
                  $konten = 'admin/img/pembeli/';
                  move_uploaded_file($dapat, $konten.$img_user);

                  $edit_lah = mysqli_query ($terhubung, "UPDATE tbl_pembeli SET foto_pembeli='$img_user' WHERE nama_lengkap = '$nama_lengkap'");

                  if ($edit_lah) {
                    ?>
                      <script type="text/javascript">
                        alert('Edit data berhasil');
                        document.location.href="beranda.php?modul=panel/content&page=home";
                      </script>
                    <?php
                  } else {
                    ?>
                      <script type="text/javascript">
                        alert('Edit data gagal');
                      </script>
                    <?php
                  }
                }
              ?>
</form>

          <!-- <ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
          </ul> 
               
          <div class="panel panel-default">
            <div class="panel-heading">Social Media</div>
            <div class="panel-body">
              <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
            </div>
          </div> -->
          
        </div><!--/col-3-->
      <div class="col-sm-9">
            <ul class="nav nav-tabs">
<!--                 <li class="active"><a data-toggle="identitas" href="#datadiri">Menu 1</a></li>
                <li><a data-toggle="tab" href="#home">Edit Profil</a></li> -->
                <!-- <li><a data-toggle="tab" href="#settings">Menu 2</a></li> -->
              </ul>

          <div class="identitas-content">
          <div class="identitas-pane active" id="datadiri">
              <div class="panel panel-default">
            <div class="panel-heading"><font size="5"><center><b>My Profile</b></center></font><i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body">
                  <font size="4">Nama Lengkap :</font> <br /><b><?php echo "$tampil[nama_lengkap]"; ?></b><br />
                  <font size="4">Jenis Kelamin :</font> <br /><b><?php echo "$tampil[jenis_kelamin]"; ?></b><br />
                  <font size="4">Email :</font> <br /><b><?php echo "$tampil[username]"; ?></b><br />
                  <font size="4">Password :</font> <br /><b><?php echo "$tampil[password]"; ?></b><br />
                  <font size="4">Alamat :</font> <br /><b><?php echo "$tampil[alamat]"; ?></b>
<br /><br /><br /><div>
      * Perhatian :<br>
      Untuk keamanan Password anda telah dibungkus (dienkripsi md5)<br>
    </div>
            </div>
          </div>
          </div>
          </div>

          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr> <font size="5"><center><b>Form Edit Profile</b></center></font>
                  <form class="form" action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Nama Lengkap</h4></label>
                              <input type="text" class="form-control" name="id_nama" value="<?php echo "$tampil[nama_lengkap]"; ?>" title="Silahkan Masukkan Nama Lengkap">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Jenis Kelamin</h4></label><br>
                              <select style="height: 35px; width: 200px;" name="jenis_kelamin">
                                <option value="<?php echo "$tampil[jenis_kelamin]"; ?>"><?php echo "$tampil[jenis_kelamin]"; ?></option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                              </select>
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="phone"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" value="<?php echo "$tampil[username]"; ?>" title="Silahkan Masukkan Username">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Password</h4></label>
                              <input type="password" class="form-control" name="pass_band" placeholder="Silahkan Masukkan Password Baru" title="Silahkan Masukkan Password" required/>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="phone"><h4>No. Handphone / WhatsApp</h4></label>
                              <input type="text" class="form-control" name="whatsapp" value="<?php echo "$tampil[handphone]"; ?>" title="Silahkan Masukkan Kontak Anda">
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                              <label><h4>Alamat</h4></label>
                              <input type="text" class="form-control" name="alamat" value="<?php echo "$tampil[alamat]"; ?>" title="Silahkan Masukkan Alamat">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br />
                                <center><button class="btn btn-lg btn-success" type="submit" name="edit_form"><i class="glyphicon glyphicon-ok-sign"></i> Simpan Perubahan</button></center>
                            </div>
                      </div>
              <?php
                if (isset($_POST['edit_form'])) {
                  $nama_session = $_SESSION['nama_lengkap'];
                  $nama_baru = $_POST['id_nama'];
                  $jenis_kelamin = $_POST['jenis_kelamin'];
                  $contact = $_POST['whatsapp'];
                  $username = $_POST['email'];
                  $password = md5($_POST['pass_band']);
                  $alamat = $_POST['alamat'];
                  $edit_kan = mysqli_query ($terhubung, "UPDATE tbl_pembeli SET username='$username', password='$password', nama_lengkap='$nama_baru', handphone='$contact', jenis_kelamin='$jenis_kelamin', alamat='$alamat' WHERE nama_lengkap = '$nama_session'");
                  if ($edit_kan) {
                    ?>
                      <script type="text/javascript">
                        alert('Edit berhasil, Silahkan login kembali');
                        document.location.href="panel/content/logout.php";
                      </script>
                    <?php
                  } else {
                    ?>
                      <script type="text/javascript">
                        alert('Edit data gagal');
                      </script>
                    <?php
                  }
                }
            ?>
                </form>
              <hr>  
             </div><!--/tab-pane-->

              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
    
    <br><div style="margin-left: 430px;">
      * Perhatian :<br>
      1. Jika Mengubah Identitas wajib mengubah Password (Kata Sandi)<br>
      2. Silahkan Login Kembali jika sudah mengubah Identitas
    </div>
    <br />
</body>
</html>
