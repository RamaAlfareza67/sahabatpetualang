<?php
  $id = $_GET['id_category'];
  $sql= mysqli_query($terhubung, "DELETE FROM tbl_category WHERE id_category='$id'");
  $delete = mysqli_affected_rows($terhubung);
    if( $delete > 0 ) {
      ?>
      <script type="text/javascript">
        alert('Data berhasil dihapus');
        document.location.href="index.php?modul=pages/content&page=category";
      </script>
      <?php
    }
    else {
      ?>
      <script type="text/javascript">
        alert('Data gagal dihapus');
        document.location.href="index.php?modul=pages/content&page=category";
      </script>
      <?php
    }
?>
