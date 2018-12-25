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
              <li class="breadcrumb-item active">Riwayat Penyewa</li>
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
              <h3 class="card-title">Riwayat Penyewa</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="table-responsive">
              <table id="dataTable" class="table table-bordered table-striped">
              	<?php    
                $SQL = "SELECT id_order, nama_category, nama_produk, tanggal_order, jam_order, status_order, nama_lengkap, email, kode_pos, kontak, alamat, harga, harga_total, foto, qty, status_transaksi FROM tbl_order_pemesan order by id_order DESC";
                $result = mysqli_query($terhubung, $SQL);
                $num = mysqli_num_rows($result);
                if($num > 0) {
                  $no = 1;
          		?>
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pembeli</th>
                  <th>Status Beli</th>
                  <th>Status Transaksi</th>
                  <th><center>Foto Pembeli</center></th>
                  <th>Alamat</th>
                  <th>Kategori</th>
                  <th>Alat</th>
                  <th>QTY</th>
                  <th>Kontak</th>
                  <th>Email</th>
                  <th>Kode Pos</th>
                  <th>Harga Total</th>
                  <th>Tanggal Beli</th>
                  <th>Jam Pembelian</th>
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
                  <td><?php echo "$data[status_order]"; ?><br />
                    <center><a href="index.php?modul=pages/action&page=edit_tenant&id_order=<?php echo "$data[id_order]"; ?>"><img src="img/icon/edit.png" width="20" height="20" onclick="return confirm('Yakin ingin di Edit?'); "></a></center>
                  </td>
                  <td><?php echo "$data[status_transaksi]"; ?><br />
                    <center><a href="index.php?modul=pages/action&page=edit_transaksi&id_order=<?php echo "$data[id_order]"; ?>"><img src="img/icon/edit.png" width="20" height="20" onclick="return confirm('Yakin ingin di Edit?'); "></a></center>
                  </td>
                  <td><center><a target="_blank" href="img/foto_pembeli/<?php echo "$data[foto]"; ?>"><img src="img/foto_pembeli/<?php echo "$data[foto]"; ?>" width="50%" height="50%"></a></center></td>
                  <td><?php echo "$data[alamat]"; ?></td>
                  <td><?php echo "$data[nama_category]"; ?></td>
                  <td><?php echo "$data[nama_produk]"; ?></td>
                  <td><?php echo "$data[qty]"; ?></td>
                  <td><?php echo "$data[kontak]"; ?></td>
                  <td><?php echo "$data[email]"; ?></td>
                  <td><?php echo "$data[kode_pos]"; ?></td>
                  <td>Rp <?php echo "$data[harga_total]"; ?>.000,-</td>
                  <td><?php echo "$data[tanggal_order]"; ?></td>
                  <td><?php echo "$data[jam_order]"; ?> WIB</td>
                  <td><center><a href="index.php?modul=pages/action&page=delete_tenant&id_order=<?php echo "$data[id_order]"; ?>"><img src="img/icon/delete.png" width="20" height="20" onclick="return confirm('Yakin ingin di Hapus?'); "></a></center></td>
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