<?php
  $id = $_GET['id_transaksi'];
  $sql= mysqli_query($terhubung, "DELETE FROM tbl_transaksi WHERE id_transaksi='$id'");
  $delete = mysqli_affected_rows($terhubung);
    if( $delete > 0 ) {
      ?>
      <script type="text/javascript">
        alert('Data berhasil dihapus');
        document.location.href="index.php?modul=pages/content&page=proof_of_transaction";
      </script>
      <?php
    }
    else {
      ?>
      <script type="text/javascript">
        alert('Data gagal dihapus');
        document.location.href="index.php?modul=pages/content&page=proof_of_transaction";
      </script>
      <?php
    }
?>
