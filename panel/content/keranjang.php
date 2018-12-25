<?php
// $id_produk = $_GET['id_produk'];
// $id_category = $_GET['id_category'];
$id_pembeli=$_GET['id_pembeli'];
$query_keranjang=mysqli_query($terhubung, "SELECT * FROM tbl_keranjang where id_pembeli='$id_pembeli'");
$cek_keranjang=mysqli_num_rows($query_keranjang);
?>
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
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?modul=pages/content&page=dashboard">Home</a></li>
              <li class="breadcrumb-item active">Admin</li>
            </ol> -->
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
              <h3 class="card-title"><center>Tabel Total Peminjaman</center></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Produk</th>
                      <th>Nama Produk</th>
                      <th>Stok Alat</th>
                      <th>Jumlah Pesanan (Qty)</th>
                      <th>Harga Satuan</th>
                      <th>Hapus</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    include "panel/content/fungsi_rupiah.php";
                    $no=1;
                    $sub_total = 0;
                    while($data_keranjang=mysqli_fetch_array($query_keranjang)){
                      $query_produk=mysqli_query($terhubung, "SELECT * FROM tbl_produk where id_produk='$data_keranjang[id_produk]'");
                      $data_produk=mysqli_fetch_array($query_produk);
                      $harga = $data_produk['harga'];
                      $harga_rupiah=format_rupiah($harga);
                      ?>
                      <tr>
                        <td><center><?php echo "$no"; ?></td>
                        <td><img src="admin/img/produk/<?php echo "$data_produk[gambar_produk]"; ?>" width="100" height="100"></td>
                        <td><?php echo "$data_produk[nama_produk]"; ?></td>
                        <td><?php echo "$data_produk[stok_barang]"; ?></td>
                        <td><?php echo "$data_keranjang[qty]"; ?>
                          <center><a href="beranda.php?modul=panel/action&page=edit_qty&id_keranjang=<?php echo "$data_keranjang[id_keranjang]"; ?>&id_pembeli=<?php echo $id_pembeli; ?>&id_produk= <?php echo "$data_produk[id_produk]"; ?>&id_category=<?php echo "$data_produk[id_category]"; ?>&qty=<?php echo $cek_keranjang; ?>">
                            <input type="submit" class="btn btn-primary" name="" value="Edit Qty">
                          </a></center>
                        </td>
                        <td>Rp <?php echo "$harga_rupiah"; ?>.000,-</td>

                        <td><center><a href="panel/action/hapus_keranjang.php?id_keranjang=<?php echo "$data_keranjang[id_keranjang]"; ?>&id_pembeli=<?php echo $id_pembeli; ?>&id_produk= <?php echo "$data_produk[id_produk]"; ?>&id_category=<?php echo "$data_produk[id_category]"; ?>&qty=<?php echo $cek_keranjang; ?>"><img src="admin/img/icon/delete.png" width="20" height="20" onclick="return confirm('Yakin ingin di Hapus?'); "></a></center></td>
                        
                      </tr>   
                      <?php
                      $no++;
                      $sub_total +=$harga_rupiah * $data_keranjang['qty'];
                    }
                    ?>
                    <form method="post" action="beranda.php?modul=panel/content&page=order&id_keranjang=<?php echo "$data_keranjang[id_keranjang]"; ?>&id_pembeli=<?php echo $id_pembeli; ?>&jumlah_total=<?php echo $sub_total; ?>" enctype="multipart/form-data">
                    <tr>
                      <td colspan="5"><div style="float:right;">Jumlah</div></td>
                      <td>Rp <?php echo $sub_total; ?>.000,-
                      </td>
                      <td colspan="7">
                        <input type="hidden" name="id_pembeli" value="<?php echo $id_pembeli; ?>">
                        <!-- <input type="hidden" name="jumlah_total" value="<?php echo $sub_total; ?>"> -->
                        <button name="change_cart" class="btn btn-primary">Bayar</button>
                      </form>
                    </td>
                  </tr>
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