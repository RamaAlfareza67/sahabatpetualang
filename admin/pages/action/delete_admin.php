<?php
  $id = $_GET['id_admin'];
  $sql= mysqli_query($terhubung, "DELETE FROM admin WHERE id_admin='$id'");
  $delete = mysqli_affected_rows($terhubung);
    if( $delete > 0 ) {
      ?>
      <script type="text/javascript">
        alert('Data berhasil dihapus');
        document.location.href="index.php?modul=pages/content&page=admin";
      </script>
      <?php
    }
    else {
      ?>
      <script type="text/javascript">
        alert('Data gagal dihapus');
        document.location.href="index.php?modul=pages/content&page=admin";
      </script>
      <?php
    }
?>
