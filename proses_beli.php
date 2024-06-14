<?php
include 'koneksi.php';

// Get POST data
$id_user = $_POST['id_user'];
$id_produk = $_POST['id_produk'];
$jumlah = $_POST['jumlah'];

// Get the product details
$sql_product = "SELECT * FROM master WHERE id = ?";
$stmt_product = $koneksi->prepare($sql_product);
$stmt_product->bind_param("i", $id_produk);
$stmt_product->execute();
$result_product = $stmt_product->get_result();
$product = $result_product->fetch_assoc();

if ($product) {
    $harga = $product['harga'];
    $stok = $product['stok'];
    $total = $harga * $jumlah;

    // Check if there is enough stock
    if ($stok >= $jumlah) {
        // Insert transaction into the transaksi table
        $sql_transaksi = "INSERT INTO transaksi (tanggal, id_user, id_produk, jumlah, harga, total) VALUES (NOW(), ?, ?, ?, ?, ?)";
        $stmt_transaksi = $koneksi->prepare($sql_transaksi);
        $stmt_transaksi->bind_param("iiidd", $id_user, $id_produk, $jumlah, $harga, $total);

        if ($stmt_transaksi->execute()) {
            // Update the stock
            $new_stok = $stok - $jumlah;
            $sql_update_stok = "UPDATE master SET stok = ? WHERE id = ?";
            $stmt_update_stok = $koneksi->prepare($sql_update_stok);
            $stmt_update_stok->bind_param("ii", $new_stok, $id_produk);

            if ($stmt_update_stok->execute()) {
                echo "Berhasil";
                // Redirect to success page
                header("Location: transaksi-berhasil.php");
                exit();
            } else {
                echo "Error updating stock: " . $stmt_update_stok->error;
            }
            $stmt_update_stok->close();
        } else {
            echo "Error: " . $stmt_transaksi->error;
        }
        $stmt_transaksi->close();
    } else {
        echo "Error: Not enough stock available.";
    }
} else {
    echo "Product not found!";
}

$stmt_product->close();
$koneksi->close();
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Berhasil</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,300&family=Open+Sans:wght@400;500;700;800&family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://xstackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
    <!--Header Dashboard-->
    <header>
        <div class="container">
            <h1><a href="index.php">Jepunmart</a></h2>
                <ul>
                    <li><a href="produk.php">Produk</a></li>
                    <ul>
                        </li>
                    </ul>
        </div>
    </header>
    <!--Konten-->
    <div class="section">
        <div class="container">
            <h3>Transaksi Berhasil</h3>
            <div class="box">
                <div class="produk-detail">
                    <h2 class="nama-produk-detail">Terima kasih atas pembelian Anda!</h2>
                    <p class="transaksi-berhasil">Transaksi Anda telah berhasil diproses. Kami akan segera memproses pesanan <br> Anda dan mengirimkannya dalam waktu dekat.</p>
                    <a href="index.php" class="btn">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-content">
            <h6>Jepunmart</h6>
            <p>Memenuhi segala kebutuhan anda!</p>
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy;2024 Jepunmart designed by <span>Raditya Pradana</span></p>
        </div>
    </footer>