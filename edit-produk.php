<?php 
session_start();
include 'koneksi.php';

// Redirect to login page if not logged in
if(!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true){
    header('Location: login.php');
    exit;
}

// Get product ID from URL
if(isset($_GET['id'])){
    $id_produk = $_GET['id'];
} else {
    header('Location: data-produk.php');
    exit;
}

// Fetch product data based on ID
$query = "SELECT * FROM master WHERE id = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param('i', $id_produk);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows == 0){
    header('Location: data-produk.php');
    exit;
}

$p = $result->fetch_object();

// Handle form submission
if(isset($_POST['submit'])){
    $kategori = $_POST['kategori'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];
    $supplier = $_POST['supplier'];

    // Handle image upload
    if(isset($_FILES['foto']) && $_FILES['foto']['error'] === 0){
        $file_name = $_FILES['foto']['name'];
        $tmp_name = $_FILES['foto']['tmp_name'];
        $file_size = $_FILES['foto']['size'];

        // Check file type
        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed_types = array('jpg', 'jpeg', 'png', 'webp');

        if(in_array($file_type, $allowed_types)){
            $new_file_name = uniqid('produk_') . '.' . $file_type;
            $upload_dir = './produk/';
            $upload_path = $upload_dir . $new_file_name;

            if(move_uploaded_file($tmp_name, $upload_path)){
                // Delete previous image if exists
                if(file_exists($upload_dir . $p->foto)){
                    unlink($upload_dir . $p->foto);
                }
                $foto = $new_file_name;
            } else {
                echo '<script>alert("Failed to upload image.");</script>';
                $foto = $p->foto;
            }
        } else {
            echo '<script>alert("Invalid file type.");</script>';
            $foto = $p->foto;
        }
    } else {
        $foto = $p->foto;
    }

    // Update product data in database
    $query_update = "UPDATE master SET 
        id_kategori = ?, 
        nama = ?, 
        harga = ?, 
        deskripsi = ?,
        stok = ?, 
        supplier = ?, 
        foto = ? 
        WHERE id = ?";
    $stmt_update = $koneksi->prepare($query_update);
    $stmt_update->bind_param('isdssssi', $kategori, $nama, $harga, $deskripsi, $stok, $supplier, $foto, $id_produk);

    if($stmt_update->execute()){
        echo '<script>alert("Update data berhasil")</script>';
        echo '<script>window.location="data-produk.php"</script>';
    } else {
        echo '<script>alert("Failed to update data.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="style.css"> 
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
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

<div class="section">
    <div class="container">
        <h3>Edit Produk</h3>
        <div class="box">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="input-control">
                    <p>Kategori</p>
                    <select name="kategori" required>
                        <option value="">--Pilih--</option>
                        <?php
                        $kategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id DESC");
                        while($r = mysqli_fetch_array($kategori)){
                            $selected = ($r['id'] == $p->id_kategori) ? 'selected' : '';
                            echo '<option value="'.$r['id'].'" '.$selected.'>'.$r['nama_kategori'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="input-control">
                    <p>Nama Produk</p>
                    <input type="text" name="nama" placeholder="Nama Produk" class="input-control" value="<?php echo $p->nama ?>" required>
                </div>
                <div class="input-control">
                    <p>Harga Produk</p>
                    <input type="text" name="harga" placeholder="Harga Produk" class="input-control" value="<?php echo $p->harga ?>" required>
                </div>
                <div class="input-control">
                    <p>Foto Produk</p>
                    <img src="produk/<?php echo $p->foto ?>" width="100px">
                    <input type="file" name="foto" class="input-control">
                </div>
                <div class="input-control">
                    <p>Stok</p>
                    <input type="text" name="stok" placeholder="Stok Produk" class="input-control" value="<?php echo $p->stok ?>" required>
                </div>
                <div class="input-control">
                    <p>Supplier</p>
                    <input type="text" name="supplier" placeholder="Supplier Produk" class="input-control" value="<?php echo $p->supplier ?>" required>
                </div>
                <div class="input-control">
                    <p>Deskripsi</p>
                    <textarea name="deskripsi" placeholder="Deskripsi Produk" class="input-control" required><?php echo $p->deskripsi ?></textarea>
                </div>
                <button type="submit" name="submit" class="btn">Simpan</button>
            </form>
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
        <p>Copyright &copy; 2024 Jepunmart designed by <span>Raditya Pradana</span></p>
    </div>
</footer>
</body>
</html>
