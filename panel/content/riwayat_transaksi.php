<?php
$nama_lengkap = $_SESSION['nama_lengkap'];
$sqlo     = mysqli_query ($terhubung, "SELECT * FROM tbl_pembeli WHERE nama_lengkap = '$nama_lengkap'");
$tampil  = mysqli_fetch_array($sqlo)
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
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
            <h3 class="card-title"><center>Tabel Riwayat Pembelian</center></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
              <table id="dataTable" class="table table-bordered table-striped">
               <?php    
               $SQL = "SELECT id_order, nama_category, nama_produk, tanggal_order, jam_order, status_order, nama_lengkap, email, kode_pos, kontak, alamat, harga, harga_total, foto, qty, status_transaksi FROM tbl_order_pemesan WHERE nama_lengkap = '$tampil[nama_lengkap]' order by id_order DESC";
               $result = mysqli_query($terhubung, $SQL);
               $num = mysqli_num_rows($result);
               if($num > 0) {
                $no = 1;
                ?>
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pembeli</th>
                    <th>Kategori</th>
                    <th>Alat</th>
                    <th>QTY</th>
                    <th>Harga Satuan</th>
                    <th>Tanggal Order</th>
                    <th>Jam Order</th>
                    <th>Status Order</th>
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
                    <td><?php echo "$data[nama_category]"; ?></td>
                    <td><?php echo "$data[nama_produk]"; ?></td>
                    <td><?php echo "$data[qty]"; ?></td>
                    <td>Rp <?php echo "$data[harga]"; ?>,-</td>
                    <td><?php echo "$data[tanggal_order]"; ?></td>
                    <td><?php echo "$data[jam_order]"; ?> WIB</td>
                    <td><?php echo "$data[status_order]"; ?></td>
                    <td><center><a href="beranda.php?modul=panel/action&page=delete_transaksi&id_order=<?php echo "$data[id_order]"; ?>"><img src="admin/img/icon/delete.png" width="20" height="20" onclick="return confirm('Yakin ingin di Hapus?'); "></a></center></td>
                  </tr>   
                  <?php
                  $no++;
                }
                ?>
              </tbody>
              <?php
            }
            else{
              echo '<div style="text-align: center;">Riwayat Pembelian masih kosong</div>';
            }
            ?>
          </table>
          <br /><br />
          <table id="dataTable" class="table table-bordered table-striped">
            <?php    
            $SQL = "SELECT id_order, nama_category, nama_produk, tanggal_order, jam_order, status_order, nama_lengkap, email, kode_pos, kontak, alamat, harga, harga_total, foto, qty, status_transaksi FROM tbl_order_pemesan WHERE nama_lengkap = '$tampil[nama_lengkap]' order by id_order DESC";
            $result = mysqli_query($terhubung, $SQL);
            $num = mysqli_num_rows($result);
            if($num > 0) {
              $no = 1;
              ?>
              <thead>
                <tr>
                  <?php
                  $data_harga = mysqli_fetch_array($result)
                  ?>
                  <th>TOTAL PEMBELIAN : <br />QTY x Harga Satuan = Rp <?php echo "$data_harga[harga_total]"; ?>.000,-</th>
                </tr>
              </thead>
              <tbody>
                <td>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;

                  <?php
                  $query = mysqli_query($terhubung, "SELECT id_order, nama_category, nama_produk, tanggal_order, jam_order, status_order, nama_lengkap, email, kode_pos, kontak, alamat, harga, harga_total, foto, qty, status_transaksi FROM tbl_order_pemesan WHERE nama_lengkap = '$tampil[nama_lengkap]' order by id_order DESC");
                  if ($query) {
                    $baris = mysqli_fetch_array($query);
                    $id_order = $baris[0];
                    $nama_category = $baris[1];
                    $nama_produk = $baris[2];
                    $tanggal_order = $baris[3];
                    $jam_order = $baris[4];
                    $status_order = $baris[5];
                    $nama_lengkap = $baris[6];
                    $email = $baris[7];
                    $kode_pos = $baris[8];
                    $kontak = $baris[9];
                    $alamat = $baris[10];
                    $harga = $baris[11];
                    $harga_total = $baris[12];
                    $foto = $baris[13];
                    $qty = $baris[14];
                    $status_transaksi = $baris[15];
                  }
                  ?>

                  <?php
                  if ($status_transaksi == 'Belum Transaksi') {
                    ?>
                    <a href="beranda.php?modul=panel/content&page=kirim_transaksi">
                      <input type="submit" class="btn btn-primary" name="" value="Kirim Bukti Transaksi">
                    </a></td>
                    <?php
                  }
                  else {
                    ?>
                    <button type="submit" class="btn btn-primary" style="background: red;" onclick="return confirm('Anda sudah Transaksi?')">Anda Sudah Transaksi</button>
                  </tbody>
                  <?php
                }
                ?>
              </tbody>
              <?php
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

