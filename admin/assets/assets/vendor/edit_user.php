<!-- <?php

  if($_GET['mode']=='update'){
  $nama = $_GET['data'];
  

  require ("../config.php");
  if (mysqli_connect_errno()) {
    echo "Koneksi ke server gagal";
    exit();
  }
  $query = "SELECT nama, email, username, password, foto_user FROM user WHERE nama = '$nama'";
  $result = mysqli_query($connect, $query);
  if ($result) {
    $row = mysqli_fetch_array($result);
    $nama = $row[0];
    $email = $row[1];
    $username = $row[2];
    $password = $row[3];
    $foto_user = $row[4];
  }

?>
      -->

    <?php
      require("../config.php");
      $result = mysqli_query($connect, "SELECT * FROM user"); 
      while ($data = mysqli_fetch_array($result)) {
        ?>
  
          <div class="col-lg-12">
            <section class="content-header">
          
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">>Tambah User</li>
          </ol>

        </section>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-desktop"></i> Tambah User</h3> 
                        </div>
   <br>
          <div class="row">
        <div class="col-lg-8 mb-4">
          <form action="edit_user_action.php" method="post" enctype="multipart/form-data">
            <div class="control-group form-group">
              <div class="controls">
                <label>Nama Lengkap :</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>">
                <p class="help-block"></p>
              </div>
            </div>
             <div class="control-group form-group">
              <div class="controls">
                <label>Email :</label>
                <input type="email" class="form-control" name="email" value="<?php echo $data['email']; ?>">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Username :</label>
                <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>">
              </div>
            </div>
             <div class="control-group form-group">
              <div class="controls">
                <label>Password :</label>
                <input type="password" class="form-control" name="password" value="<?php echo $data['password']; ?>">
              </div>
            </div>
             <div class="control-group form-group">
              <div class="controls">
                <label>Konfirmasi Password :</label>
                <input type="password" class="form-control" name="password2" value="<?php echo $data['password']; ?>">
              </div>
            </div>
             <div class="control-group form-group">
              <div class="controls">
                <label>Upload Foto Formal :</label>
                <br>
                <input type="file" name="gambar" value="<?php echo $data['foto_user']; ?>"></input>
              </div>
            </div>
            <br>
            <br>
            <!-- For success/fail messages -->
            <center><button type="submit" class="btn btn-primary" name="batal" style="margin-right: 15px;">Batalkan</button>
            <button type="submit" class="btn btn-primary" name="edit_user" onclick="return confirm('Apakah anda yakin ingin Mengedit?')">Edit</button></center>
            <?php
    }
    ?>  
            <br>
            <br>
            <br>
            <br>
          </form>
        </div>
      </div>

        </table>     
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
  <?php
    } 
  ?>