<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <a href="index.php?modul=pages/content&page=add_admin">
      		<button type="button" class="btn btn-info btn-md navbar-left">Tambah Admin</button></a> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?modul=pages/content&page=dashboard">Home</a></li>
              <li class="breadcrumb-item active">Buku Tamu</li>
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
              <h3 class="card-title">Buku Tamu</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
              <table id="dataTable" class="table table-bordered table-striped">
              	<?php    

                $SQL = "SELECT id_pesan, nama_lengkap, email, telp, isi_pesan FROM pesan order by nama_lengkap DESC";

                $result = mysqli_query($terhubung, $SQL);
                $num = mysqli_num_rows($result);
                if($num > 0) {
                  $no = 1;
          		?>
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Lengkap</th>
                  <th>Email</th>
                  <th>Handphone/WhatsApp</th>
                  <th>Isi Pesan</th>
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
                  <td><?php echo "$data[email]"; ?></td>
                  <td><?php echo "$data[telp]"; ?></td>
                  <td><?php echo "$data[isi_pesan]"; ?></td>
                  <td><center><a href="index.php?modul=pages/action&page=delete_pesan&id_pesan=<?php echo "$data[id_pesan]"; ?>"><img src="img/icon/delete.png" width="20" height="20" onclick="return confirm('Yakin ingin di Hapus?'); "></a></center></td>
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