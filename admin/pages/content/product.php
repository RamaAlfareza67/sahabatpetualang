<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <a href="index.php?modul=pages/content&page=add_product">
      		<button type="button" class="btn btn-info btn-md navbar-left">Tambah Produk</button></a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?modul=pages/content&page=dashboard">Home</a></li>
              <li class="breadcrumb-item active">Tambah Produk</li>
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
              <h3 class="card-title">Tambah Produk</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="table-responsive">
              <table id="dataTable" class="table table-bordered table-striped">
              	<?php    
                $SQL = "SELECT id_produk, id_category, nama_produk, deskripsi, harga, stok_barang, gambar_produk FROM tbl_produk order by id_produk DESC";

                $result = mysqli_query($terhubung, $SQL);
                $num = mysqli_num_rows($result);
                if($num > 0) {
                  $no = 1;
          		?>
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kategori</th>
                  <th>Nama Produk</th>
                  <th><center>Foto Produk</center></th>
                  <th>Harga Rental/Hari</th>
                  <th>Stok Barang</th>
                  <th>Deskripsi Produk</th>
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
                  <td>
            <?php
             $sq = mysqli_query($terhubung, "SELECT * FROM tbl_category WHERE id_category='$data[id_category]'");
             $lihat = mysqli_fetch_array($sq);
            ?>
                  <?php echo "$lihat[nama_category]"; ?>
                  </td>
                  <td><?php echo "$data[nama_produk]"; ?></td>
                  <td><center><a target="_blank" href="img/produk/<?php echo "$data[gambar_produk]"; ?>"><img src="img/produk/<?php echo "$data[gambar_produk]"; ?>" width="50%" height="50%"></a></center></td>
                  <td>Rp <?php echo "$data[harga]"; ?>,-</td>
                  <td><?php echo "$data[stok_barang]"; ?></td>
                  <td><?php echo "$data[deskripsi]"; ?></td>
                  <td><center><a href="index.php?modul=pages/action&page=edit_product&id_produk=<?php echo "$data[id_produk]"; ?>"><img src="img/icon/edit.png" width="20" height="20" onclick="return confirm('Yakin ingin di Edit?'); "></a></center></td>
                  <td><center><a href="index.php?modul=pages/action&page=delete_product&id_produk=<?php echo "$data[id_produk]"; ?>"><img src="img/icon/delete.png" width="20" height="20" onclick="return confirm('Yakin ingin di Hapus?'); "></a></center></td>
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