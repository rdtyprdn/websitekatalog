<?php 
session_start();
include 'koneksi.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

// Function to handle Excel export
if (isset($_GET['action']) && $_GET['action'] == 'download_excel') {
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=Data_Transaksi.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>No</th>";
    echo "<th>Id Transaksi</th>";
    echo "<th>Tanggal</th>";
    echo "<th>Id Produk</th>";
    echo "<th>Harga</th>";
    echo "<th>Jumlah</th>";
    echo "<th>Id User</th>";
    echo "<th>Total</th>";
    echo "</tr>";

    $no = 1;
    $query = "SELECT * FROM transaksi ORDER BY id_transaksi DESC";
    $result = mysqli_query($koneksi, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row['id_transaksi'] . "</td>";
        echo "<td>" . $row['tanggal'] . "</td>";
        echo "<td>" . $row['id_produk'] . "</td>";
        echo "<td>" . number_format($row['harga']) . "</td>";
        echo "<td>" . $row['jumlah'] . "</td>";
        echo "<td>" . $row['id_user'] . "</td>";
        echo "<td>" . number_format($row['total']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
<!--Header Dashboard-->
<header>
    <div class="container">
        <h1><a href="dashboard.php">Jepunmart</a></h1>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="adminprofil.php">Admin Profile</a></li>
            <li><a href="data-kategori.php">Data Kategori</a></li>
            <li><a href="data-produk.php">Data Produk</a></li>
            <li><a href="data-transaksi.php">Data Transaksi</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</header>

<!--content-->
<div class="section">
    <div class="container">
        <h3>Data Transaksi</h3>
        <div class="box">
            <a href="?action=download_excel" class="excel-btn">Download Excel</a>
            <p><a href="tambah-transaksi.php" class="btn">Tambah Data</a> </p>
            <table border="1" cellspacing="0" class="table">
                <thead>
                    <tr>
                        <th width="60px">No</th>
                        <th>Id Transaksi</th>
                        <th>Tanggal</th>
                        <th>Id Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Id User</th>
                        <th>Total</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi ORDER BY id_transaksi DESC");

                    if (mysqli_num_rows($transaksi) > 0) {
                        while ($row = mysqli_fetch_array($transaksi)) {
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['id_transaksi'] ?></td>
                        <td><?php echo $row['tanggal'] ?></td>
                        <td><?php echo $row['id_produk'] ?></td>
                        <td>Rp.<?php echo number_format($row['harga']) ?></td>
                        <td><?php echo $row['jumlah'] ?></td>
                        <td><?php echo $row['id_user'] ?></td>
                        <td>Rp.<?php echo number_format($row['total']) ?></td>
                        <td>
                            <a href="proses-hapus.php?id=<?php echo $row['id_transaksi'] ?>" 
                            onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                            <button class="button-hapus-produk" type="button">
                                    <i class="ri-delete-bin-line"></i> <!-- Delete icon -->
                                </button>
                        </a>
                        </td>
                    </tr>
                    <?php }} else { ?> 
                        <tr>
                            <td colspan="9">Tidak ada data</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--Footer-->
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
</body>
</html>
