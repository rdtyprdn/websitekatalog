<?php 
    session_start();
    include 'koneksi.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<!--Header Dashboard-->
<header>
    <div class="container">
    <h1><a href="dashboard.php">Jepunmart</a></h2>
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="adminprofil.php">Admin Profile</a></li>
        <li><a href="data-kategori.php">Data Kategori</a></li>
        <li><a href="data-produk.php">Data Produk</a></li>
        <li><a href="data-transaksi.php">Data Transaksi</a></li>
        <li><a href="logout.php">Logout</a></li>
         <ul>
        </li>
    </ul>
    </div>
</header>

<!--content-->
<div class="section">
    <div class="container">
        <h3>Data Kategori</h3>
        <div class="box">
            <p ><a href="tambah-kategori.php" class="btn">Tambah Data</a> </p>
            <table border="1" cellspacing="0" class="table">
                <thead>
                    <tr>
                        <th width="60px">No</th>
                        <th>Jenis Kategori</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $kategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id DESC");
                    while($row = mysqli_fetch_array($kategori)){
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['nama_kategori'] ?></td>
                        <td class="aksi-kategori">
                            
                            <!-- Edit icon link -->
                            <a href="edit-kategori.php?id=<?php echo $row['id'] ?>">
                                <button class="button-edit-produk" type="button">
                                <i class="ri-file-edit-fill"></i><!-- Edit icon -->
                                </button>
                            </a>

                            <!-- Delete icon link -->
                            <a c href="proses-hapus.php?idk=<?php echo $row['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                                <button class="button-hapus-produk" type="button">
                                    <i class="ri-delete-bin-line"></i> <!-- Delete icon -->
                                </button>
                            </a>
                        </td>
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