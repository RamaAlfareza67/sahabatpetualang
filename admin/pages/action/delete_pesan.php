<?php
  $id = $_GET['id_pesan'];
  $sql= mysqli_query($terhubung, "DELETE FROM pesan WHERE id_pesan='$id'");
  $delete = mysqli_affected_rows($terhubung);
    if( $delete > 0 ) {
      ?>
      <script type="text/javascript">
        alert('Data berhasil dihapus');
        document.location.href="index.php?modul=pages/content&page=buku_tamu";
      </script>
      <?php
    }
    else {
      ?>
      <script type="text/javascript">
        alert('Data gagal dihapus');
        document.location.href="index.php?modul=pages/content&page=buku_tamu";
      </script>
      <?php
    }
?>
