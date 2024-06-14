<?php
session_start();
include 'koneksi.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

// Fetch product IDs and names from the database
$product_result = mysqli_query($koneksi, "SELECT id, nama FROM master");

// Handle new transaction submission
if (isset($_POST['submit'])) {
    $tanggal = $_POST['tanggal'];
    $id_produk = $_POST['id_produk'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $id_user = $_POST['id_user'];
    $total = $_POST['total'];

    $insert = mysqli_query($koneksi, "INSERT INTO transaksi (tanggal, id_produk, harga, jumlah, id_user, total) 
                                     VALUES ('$tanggal', '$id_produk', '$harga', '$jumlah', '$id_user', '$total')");

    if ($insert) {
        echo '<script>alert("Data transaksi berhasil ditambahkan!"); window.location="data-transaksi.php";</script>';
    } else {
        echo '<script>alert("Gagal menambahkan data transaksi."); window.location="data-transaksi.php";</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Transaksi</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,300&family=Open+Sans:wght@400;500;700;800&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <script>
        function calculateTotal() {
            const harga = document.querySelector('input[name="harga"]').value;
            const jumlah = document.querySelector('input[name="jumlah"]').value;
            const total = document.querySelector('input[name="total"]');
            total.value = harga * jumlah;
        }
    </script>
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
    <h3>Tambah Data Transaksi</h3>
        <!-- Form for adding a new transaction -->
        <div class="box">
            <form action="" method="post">
                <div class="input-control">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="input-control" required>
                </div>
                <div class="input-control">
                    <label>Id Produk</label>
                    <select name="id_produk" class="input-control" required>
                        <option value="">--Pilih--</option>
                        <?php while ($row = mysqli_fetch_array($product_result)) { ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-control">
                    <label>Harga</label>
                    <input type="number" name="harga" class="input-control" required oninput="calculateTotal()">
                </div>
                <div class="input-control">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="input-control" required oninput="calculateTotal()">
                </div>
                <div class="input-control">
                    <label>Id User</label>
                    <input type="text" name="id_user" class="input-control" required>
                </div>
                <div class="input-control">
                    <label>Total</label>
                    <input type="number" name="total" class="input-control" required readonly>
                </div>
                <input type="submit" name="submit" value="Tambah Data Transaksi" class="btn">
            </form>
        </div>
    </div>
</div>

<!--Footer-->
<footer>
    <div class="footer-content">
        <h6>Elektrons</h6>
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
        <p>copyright &copy;2024 Elektrons designed by <span>GUSDE</span></p>
    </div>
</footer>
</body>
</html>
