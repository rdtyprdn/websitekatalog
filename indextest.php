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
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
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

<!-- Produk-->
<div class="section">
    <div class="container">
        <h2>Produk Kami</h2>
        <div class="box">
        <a href="detail-produk.php?id=<?php echo $p['id'] ?>">
            <div class="col-4">
                <img src="produk/bimoli.jpg">
                <p class="nama">Minyak Bimoli</p>
                <p class="harga">Rp. 40000</p>
            </div>
                <a href="detail-produk.php?id=<?php echo $p['id'] ?>">
                    <div class="col-4">
                        <img src="produk/sania.png">
                        <p class="nama">Minyak Sania</p>
                        <p class="harga">Rp. 40000</p>

                    </div>
                    <a href="detail-produk.php?id=<?php echo $p['id'] ?>">
                    <div class="col-4">
                        <img src="produk/fortune.jpg">
                        <p class="nama">Minyak Fortune</p>
                        <p class="harga">Rp. 25000</p>

                    </div>
                    <a href="detail-produk.php?id=<?php echo $p['id'] ?>">
                    <div class="col-4">
                        <img src="produk/sunco.jpg">
                        <p class="nama">Minyak Sunco</p>
                        <p class="harga">Rp. 22000</p>

                    </div>
                    <a href="detail-produk.php?id=<?php echo $p['id'] ?>">
                    <div class="col-4">
                        <img src="produk/berasratu.jpg">
                        <p class="nama">Beras Ratu</p>
                        <p class="harga">Rp. 80000</p>

                    </div>
                    <a href="detail-produk.php?id=<?php echo $p['id'] ?>">
                    <div class="col-4">
                        <img src="produk/berasputri.jpg">
                        <p class="nama">Beras Putri</p>
                        <p class="harga">Rp. 76000</p>

                    </div>
                    <a href="detail-produk.php?id=<?php echo $p['id'] ?>">
                    <div class="col-4">
                        <img src="produk/setrawangi.jpeg">
                        <p class="nama">Beras Setra Wangi</p>
                        <p class="harga">Rp. 50000</p>

                    </div>
                    <a href="detail-produk.php?id=<?php echo $p['id'] ?>">
                    <div class="col-4">
                        <img src="produk/sipulen.webp">
                        <p class="nama">Beras Sipulen</p>
                        <p class="harga">Rp. 30000</p>

                    </div>
                    <a href="detail-produk.php?id=<?php echo $p['id'] ?>">
                    <div class="col-4">
                        <img src="produk/ultramilkplain.webp">
                        <p class="nama">Susu Ultramilk Plain</p>
                        <p class="harga">Rp. 6000</p>

                    </div>
                    <a href="detail-produk.php?id=<?php echo $p['id'] ?>">
                    <div class="col-4">
                        <img src="produk/diamond.webp">
                        <p class="nama">Susu Diamond</p>
                        <p class="harga">Rp. 13000</p>

                    </div>
                    <a href="detail-produk.php?id=<?php echo $p['id'] ?>">
                    <div class="col-4">
                        <img src="produk/dancow.webp">
                        <p class="nama">Susu Dancow Fortigrow</p>
                        <p class="harga">Rp. 250000</p>

                    </div>
                    <a href="detail-produk.php?id=<?php echo $p['id'] ?>">
                    <div class="col-4">
                        <img src="produk/telurayam.webp">
                        <p class="nama">Telur Ayam 1 Keranjang</p>
                        <p class="harga">Rp. 25000</p>

                    </div>
                    <a href="detail-produk.php?id=<?php echo $p['id'] ?>">
                    <div class="col-4">
                        <img src="produk/sgm.png">
                        <p class="nama">Susu SGM</p>
                        <p class="harga">Rp. 109000</p>

                    </div>
                    <a href="detail-produk.php?id=<?php echo $p['id'] ?>">
                    <div class="col-4">
                        <img src="produk/garamdolpin.webp">
                        <p class="nama">Garam Beryodium Dolpin</p>
                        <p class="harga">Rp. 3000</p>

                    </div>
                    <a href="detail-produk.php?id=<?php echo $p['id'] ?>">
                    <div class="col-4">
                        <img src="produk/gulaku.webp">
                        <p class="nama">Gula Pasir Gulaku</p>
                        <p class="harga">Rp. 17000</p>

                    </div>
                    <a href="detail-produk.php?id=<?php echo $p['id'] ?>">
                    <div class="col-4">
                        <img src="produk/kangkung.jpg">
                        <p class="nama">Sayur Kangkung 1 Ikat</p>
                        <p class="harga">Rp. 2000</p>

                    </div>
                    </body>


            
    </div>
</div>
<!--Kategori-->
<div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <?php 
        $kategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id DESC");
        if(mysqli_num_rows($kategori) > 0){
            while($k = mysqli_fetch_array($kategori)){
        
        ?>
                <a href="produk.phpkat=<?php echo $k['nama_kategori'] ?>">
                    <div class="col-5">
                        <img src="images/kategori.png" width="50px" style="margin: bottom 5px;">
                        <p><?php echo $k['nama_kategori'] ?></p>
                    </div>
                </a>
                <?php }}else{ ?>
                <p>Kategori Tidak Tersedia</p>
                <?php } ?>
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

</html>