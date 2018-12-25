<?php
  $id_pembeli = $_GET['id_pembeli'];
  $sql= mysqli_query($terhubung, "DELETE FROM tbl_pembeli WHERE id_pembeli='$id_pembeli'");
  $delete = mysqli_affected_rows($terhubung);
    if( $delete > 0 ) {
      ?>
      <script type="text/javascript">
        alert('Data berhasil dihapus');
        document.location.href="index.php?modul=pages/content&page=buyers_account";
      </script>
      <?php
    }
    else {
      ?>
      <script type="text/javascript">
        alert('Data gagal dihapus');
        document.location.href="index.php?modul=pages/content&page=buyers_accounts";
      </script>
      <?php
    }
?>
