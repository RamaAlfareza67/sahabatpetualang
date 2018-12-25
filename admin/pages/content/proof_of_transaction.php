<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <a href="index.php?modul=pages/content&page=add_product">
      		<button type="button" class="btn btn-info btn-md navbar-left">Tambah Produk</button></a> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?modul=pages/content&page=dashboard">Home</a></li>
              <li class="breadcrumb-item active">Bukti Transaksi Pembeli</li>
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
              <h3 class="card-title">Bukti Transaksi Pembeli</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="table-responsive">
              <table id="dataTable" class="table table-bordered table-striped">
              	<?php    
                $SQL = "SELECT id_transaksi, nama_lengkap, kontak, foto_transaksi, ket FROM tbl_transaksi order by id_transaksi";
                $result = mysqli_query($terhubung, $SQL);
                $num = mysqli_num_rows($result);
                if($num > 0) {
                  $no = 1;
          		?>
                <thead>
                <tr>
                  <th>No</th>
                  <th width="20%">Nama Pembeli</th>
                  <th>Kontak</th>
                  <th><center>Foto Struk Pembelian</center></th>
                  <th>Keterangan</th>
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
                  <td><?php echo "$data[kontak]"; ?></td>
                  <td><center><a target="_blank" href="img/bukti_transaksi/<?php echo "$data[foto_transaksi]"; ?>"><img src="img/bukti_transaksi/<?php echo "$data[foto_transaksi]"; ?>" width="20%" height="20%"></a></center></td>
                  <td><?php echo "$data[ket]"; ?></td>
                  <td><center><a href="index.php?modul=pages/action&page=delete_transaction&id_transaksi=<?php echo "$data[id_transaksi]"; ?>"><img src="img/icon/delete.png" width="20" height="20" onclick="return confirm('Yakin ingin di Hapus?'); "></a></center></td>
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