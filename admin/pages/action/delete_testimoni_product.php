<?php
  $id = $_GET['id_testimoni'];
  $sql= mysqli_query($terhubung, "DELETE FROM tbl_testimoni WHERE id_testimoni='$id'");
  $delete = mysqli_affected_rows($terhubung);
    if( $delete > 0 ) {
      ?>
      <script type="text/javascript">
        alert('Data berhasil dihapus');
        document.location.href="index.php?modul=pages/content&page=testimoni_product";
      </script>
      <?php
    }
    else {
      ?>
      <script type="text/javascript">
        alert('Data gagal dihapus');
        document.location.href="index.php?modul=pages/content&page=testimoni_product";
      </script>
      <?php
    }
?>
