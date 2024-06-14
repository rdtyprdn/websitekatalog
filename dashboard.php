<?php 
    session_start();
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
<!--content-->
<div class="section">
    <div class="container">
        <h3 style="font-size: 30px;">Dashboard</h3>
        <div class="box" style="height: 60vh; padding: 15px; margin: 10px 0; display: flex; justify-content: center; align-items: center;">
            <h4 style="font-size: 60px;">Selamat datang di Jepunmart</h4>
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