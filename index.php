<?php 
     include 'koneksi.php';
     
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
    <!--Search bar-->
    <div class="search">
        <div class="container">
            <form action="produk.php">
                <input type="text" name="search" placeholder="Cari Produk">
                <input type="submit" name="cari" value="Cari Produk">

            </form>
        </div>
    </div>
    </div>
</body>
<div class="box-judul" >
            
            <h4 id="selamat-datang" style="font-size: 60px">Selamat datang di Jepunmart <br> Selamat berbelanja</h4>
        </div>

<!-- Produk-->
<div class="section">
    <div class="container">
        <h2>Produk Kami</h2>
        <div class="box">
            <?php
            $produk = mysqli_query($koneksi, "SELECT * FROM master ORDER BY id 
            DESC LIMIT 16");
            if(mysqli_num_rows($produk) > 0){
                while($p = mysqli_fetch_array($produk)){
            ?>
            <a href="detail-produk.php?id=<?php echo $p['id'] ?>">
                <div class="col-4">
                    <img src="produk/<?php echo $p['foto'] ?>">
                    <p class="nama"><?php echo $p['nama'] ?></p>
                    <p class="harga">Rp. <?php echo number_format($p['harga']) ?></p>
                    <p class="deskripsi"><?php echo $p['deskripsi']; ?></p>
                </div>
                
                </a> <?php }}else{ ?> <p>Produk tidak tersedia</p>
            <?php } ?>
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
</html>