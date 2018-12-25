<?php
  $id = $_GET['id_order'];
  $sql= mysqli_query($terhubung, "DELETE FROM tbl_order_pemesan WHERE id_order='$id'");
  $delete = mysqli_affected_rows($terhubung);
    if( $delete > 0 ) {
      ?>
      <script type="text/javascript">
        alert('Data berhasil dihapus');
        document.location.href="index.php?modul=pages/content&page=tenant";
      </script>
      <?php
    }
    else {
      ?>
      <script type="text/javascript">
        alert('Data gagal dihapus');
        document.location.href="index.php?modul=pages/content&page=tenant";
      </script>
      <?php
    }
?>
