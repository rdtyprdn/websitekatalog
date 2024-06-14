<?php

include 'koneksi.php';

if(isset($_GET['idk'])){
    $idk = $_GET['idk'];
    $delete = mysqli_query($koneksi, "DELETE FROM kategori WHERE id = '$idk'");
    if($delete){
        echo '<script>window.location="data-kategori.php"</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($koneksi);
    }
}



if(isset($_GET['idp'])){
    $idp = $_GET['idp'];
    $produk = mysqli_query($koneksi, "SELECT foto FROM master WHERE id_kategori = '$idp'");
    if($produk && $p = mysqli_fetch_object($produk)) { // Check if the query returned a result
        // Ensure that the file exists before attempting to delete it
        if(file_exists('./produk/' . $p->foto)){
            // Delete the file
            if(unlink('./produk/' . $p->foto)){
                // If file deletion is successful, proceed with database record deletion
                $delete = mysqli_query($koneksi, "DELETE FROM master WHERE id_kategori = '$idp'");
                if($delete){
                    echo '<script>window.location="data-produk.php"</script>';
                } else {
                    echo "Error deleting record: " . mysqli_error($koneksi);
                }
            } else {
                echo "Error deleting file.";
            }
        } else {
            echo "File does not exist.";
        }
    } else {
        echo "No product found with ID $idp.";
    }
}



include 'koneksi.php';

if(isset($_GET['id'])){
    $delete = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi = '".$_GET['id']."'");
      echo '<script>window.location="data-transaksi.php"</script>';
}


?>
