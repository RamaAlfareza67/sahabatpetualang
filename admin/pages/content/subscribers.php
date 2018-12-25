<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <!--   <a href="index.php?modul=pages/content&page=add_news">
      		<button type="button" class="btn btn-info btn-md navbar-left">Tambah Informasi Baru</button></a> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?modul=pages/content&page=dashboard">Home</a></li>
              <li class="breadcrumb-item active">Subscribers</li>
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
              <h3 class="card-title">Subscribers</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
              <table id="dataTable" class="table table-bordered table-striped">
              <?php    
                $SQL = "SELECT id_subscribe, email FROM tbl_subscribe order by id_subscribe DESC";
                $result = mysqli_query($terhubung, $SQL);
                $num = mysqli_num_rows($result);
                if($num > 0) {
                  $no = 1;
          		?>
                <thead>
                <tr>
                  <th><center>No</center></th>
                  <th><center>Email</center></th>
                  <th><center>Hapus</center></th>
                </tr>
                </thead>
                <tbody>
				        <?php
                	while ($data = mysqli_fetch_array($result)) { 
              	?>
                <tr>
                  <td><center><?php echo "$no"; ?></td>
                  <td><?php echo "$data[email]"; ?></td>
                  <td><center><a href="index.php?modul=pages/action&page=delete_subscribers&id_subscribe=<?php echo "$data[id_subscribe]"; ?>"><img src="img/icon/delete.png" width="20" height="20" onclick="return confirm('Yakin ingin di Hapus?'); "></a></center></td>
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