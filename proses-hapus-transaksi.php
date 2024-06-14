<?php
include 'koneksi.php';

if(isset($_GET['id'])){
    $delete = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi = '".$_GET['id']."'");
      echo '<script>window.location="data-transaksi.php"</script>';
}


?>