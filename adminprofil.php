<?php 
    session_start();
    include 'koneksi.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id = '".$_SESSION['id']."'" );
    $d = mysqli_fetch_object($query);
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
<div class="section">
    <div class="container">
        <h3>Profil</h3>
        <div class="box">
            <form action="" method="POST"> 
                <p>Nama Lengkap</p>
            <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->nama ?>" required>
            <p>Username</p>
            <input type="text" name="user" placeholder="Username" class="input-control"  value="<?php echo $d->username ?>" required>
            <input type="submit" name="submit" value="Ubah Profil" class="btn">
            </form>
            <?php
if(isset($_POST['submit'])){
    $nama  = ucwords($_POST['nama']);
    $user  = $_POST['user'];
                 
    $update = mysqli_query($koneksi, "UPDATE user SET 
                    nama = '".$nama."',
                    username = '".$user."'
                    WHERE id = '".$d->id."'");
    if($update){
        echo '<script>alert("Perubahan berhasil disimpan")</script>';
        echo '<script>window.location="adminprofil.php"</script>';
    }else{
        echo 'gagal'.mysqli_error($koneksi);
    }
}
?>

        </div>

        <h3>Ubah Password</h3>
        <div class="box">
            <form action="" method="POST"> 
                <p>Password Baru</p>
            <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
                <p>Konfirmasi Password Baru</p>
            <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control"   required>
            <input type="submit" name="ubah_password" value="Ubah Password" class="btn">
            </form>
            <?php
if(isset($_POST['ubah_password'])){
    $pass1  = $_POST['pass2'];
    $pass2  = $_POST['pass2'];

    if($pass2 != $pass1){
        echo '<script>alert("Konfirmasi Password Baru Tidak Sesuai")</script>';
    }else{
        $u_pass = mysqli_query($koneksi, "UPDATE user SET 
        password = '".$pass1."'
        WHERE id = '".$d->id."'");
        if($u_pass){
            echo '<script>alert("Perubahan berhasil disimpan")</script>';
            echo '<script>window.location="adminprofil.php"</script>';
        }else{
            echo 'gagal'.mysqli_error($koneksi);
        }
    }
                 
}
?>

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