<?php
  $id = $_GET['id_spa'];
  $sql= mysqli_query($terhubung, "DELETE FROM tbl_spa WHERE id_spa='$id'");
  $delete = mysqli_affected_rows($terhubung);
    if( $delete > 0 ) {
      ?>
      <script type="text/javascript">
        alert('Data berhasil dihapus');
        document.location.href="index.php?modul=pages/content&page=shop_owner";
      </script>
      <?php
    }
    else {
      ?>
      <script type="text/javascript">
        alert('Data gagal dihapus');
        document.location.href="index.php?modul=pages/content&page=shop_owner";
      </script>
      <?php
    }
?>
