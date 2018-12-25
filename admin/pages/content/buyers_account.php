<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <a href="index.php?modul=pages/content&page=add_buyers_account">
      		<button type="button" class="btn btn-info btn-md navbar-left">Tambah Akun Pembeli</button></a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?modul=pages/content&page=dashboard">Home</a></li>
              <li class="breadcrumb-item active">Akun Pembeli</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Akun Pembeli</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="table-responsive">
              <table id="dataTable" class="table table-bordered table-striped">
              	<?php    
                $SQL = "SELECT id_pembeli, username, password, foto_pembeli, nama_lengkap, handphone, jenis_kelamin, alamat FROM tbl_pembeli order by id_pembeli DESC";
                $result = mysqli_query($terhubung, $SQL);
                $num = mysqli_num_rows($result);
                if($num > 0) {
                  $no = 1;
          		?>
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Lengkap</th>
                  <th>Foto Pembeli</th>
                  <th>Jenis Kelamin</th>
                  <th>Kontak</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Alamat</th>
                  <th>Edit</th>
                  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
				        <?php
                	while ($data = mysqli_fetch_array($result)) { 
              	?>
                <tr>
                  <td><center><?php echo "$no"; ?></td>
                  <td><?php echo "$data[nama_lengkap]"; ?></td>
                  <td><center><a target="_blank" href="img/pembeli/<?php echo "$data[foto_pembeli]"; ?>"><img src="img/pembeli/<?php echo "$data[foto_pembeli]"; ?>" width="50%" height="50%"></a></center></td>
                  <td><?php echo "$data[jenis_kelamin]"; ?></td>
                  <td><?php echo "$data[handphone]"; ?></td>
                  <td><?php echo "$data[username]"; ?></td>
                  <td><?php echo "$data[password]"; ?></td>
                  <td><?php echo "$data[alamat]"; ?></td>
                  <td><center><a href="index.php?modul=pages/action&page=edit_buyers_account&id_pembeli=<?php echo "$data[id_pembeli]"; ?>"><img src="img/icon/edit.png" width="20" height="20" onclick="return confirm('Yakin ingin di Edit?'); "></a></center></td>
                  <td><center><a href="index.php?modul=pages/action&page=delete_buyers_account&id_pembeli=<?php echo "$data[id_pembeli]"; ?>"><img src="img/icon/delete.png" width="20" height="20" onclick="return confirm('Yakin ingin di Hapus?'); "></a></center></td>
                </tr>   
				<?php
              $no++;
              }
          ?>
                </tbody>
         <?php
            }
            else{
              echo "Data Masih Kosong";
            }
          ?>
              </table>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->