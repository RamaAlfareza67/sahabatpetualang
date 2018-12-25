<?php
  $id = $_GET['id_order'];
  $sql= mysqli_query($terhubung, "DELETE FROM tbl_order_pemesan WHERE id_order='$id'");
  $delete = mysqli_affected_rows($terhubung);
    if( $delete > 0 ) {
      ?>
      <script type="text/javascript">
        alert('Riwayat transaksi berhasil dihapus');
        document.location.href="beranda.php?modul=panel/content&page=riwayat_transaksi";
      </script>
      <?php
    }
    else {
      ?>
      <script type="text/javascript">
        alert('Riwayat transaksi gagal dihapus');
        document.location.href="beranda.php?modul=panel/content&page=riwayat_transaksi";
      </script>
      <?php
    }
?>
