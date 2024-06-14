<?php 
    include 'koneksi.php';
    $produk = mysqli_query($koneksi, "SELECT * FROM master WHERE id = '".$_GET['id']. "' ");
    $p = mysqli_fetch_object($produk);
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
            <h1><a href="index.php">Jepunmart</a></h1>
            <ul>
                <li><a href="produk.php">Produk</a></li>
            </ul>
        </div>
    </header>
    <!--Search bar-->
    <div class="search">
        <div class="container">
            <form action="produk.php" method="GET">
                <input type="text" name="search" placeholder="Cari Produk"
                    value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''?>">
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>
    <!-- Product Detail -->
    <div class="section">
        <div class="container">
               <h1> Detail Produk</h1>
                <div class="box">
                <div class="col-2">
                <img src="produk/<?php echo $p->foto ?>" width="100%">
                </div>
                <div class="col-2">
                <h4><?php echo $p->nama ?></h4>
                <h5>Rp. <?php echo number_format($p->harga) ?></h5>
                <p>Deskripsi : <br>
                  <?php echo $p->deskripsi ?>
                </p>
                </div>
                <button> </button>
            </div>
        </div>
    </div>
    <!-- Form Pembelian -->
    
</body>
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
