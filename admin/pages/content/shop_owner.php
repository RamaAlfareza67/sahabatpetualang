<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <a href="index.php?modul=pages/content&page=add_shop_owner">
      		<button type="button" class="btn btn-info btn-md navbar-left">Tambah Pemilik Toko</button></a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?modul=pages/content&page=dashboard">Home</a></li>
              <li class="breadcrumb-item active">Pemilik Toko</li>
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
              <h3 class="card-title">Pemilik Toko</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
              <table id="dataTable" class="table table-bordered table-striped">
              	<?php    
                $SQL = "SELECT id_spa, nama, alamat, foto FROM tbl_spa order by nama";
                $result = mysqli_query($terhubung, $SQL);
                $num = mysqli_num_rows($result);
                if($num > 0) {
                  $no = 1;
          		?>
                <thead>
                <tr>
                  <th>No</th>
                  <th width="25%">Nama Lengkap</th>
                  <th><center>Foto Pemilik Toko</center></th>
                  <th width="25%">Alamat</th>
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
                  <td><?php echo "$data[nama]"; ?></td>
                  <td><center><a target="_blank" href="user/foto_spa/<?php echo "$data[foto]"; ?>"><img src="user/foto_spa/<?php echo "$data[foto]"; ?>" width="20%" height="20%"></a></center></td>
                  <td><?php echo "$data[alamat]"; ?></td>
                  <td><center><a href="index.php?modul=pages/action&page=edit_shop_owner&id_spa=<?php echo "$data[id_spa]"; ?>"><img src="img/icon/edit.png" width="20" height="20" onclick="return confirm('Yakin ingin di Edit?'); "></a></center></td>
                  <td><center><a href="index.php?modul=pages/action&page=delete_shop_owner&id_spa=<?php echo "$data[id_spa]"; ?>"><img src="img/icon/delete.png" width="20" height="20" onclick="return confirm('Yakin ingin di Hapus?'); "></a></center></td>
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