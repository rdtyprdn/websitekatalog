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
            <h3>Tambah Data Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="kategori" required>
                        <option value="">--Pilih--</option>
                        <?php
                   $kategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id DESC");
                   while($r = mysqli_fetch_array($kategori)){

                ?>
                        <option value="<?php echo $r['id'];?>"><?php echo $r['nama_kategori']; ?></option>

                        <?php } ?>
                    </select>
                    <p>Nama Produk</p>
                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                    <p>Harga Produk</p>
                    <input type="text" name="harga" class="input-control" placeholder="Harga" required>
                    <p>Foto</p>
                    <input type="file" name="foto" class="input-control" required>
                    <p>Deskripsi</p>
                    <textarea class="input-control" name="deskripsi" placeholder="deskripsi"></textarea>
                    <p>Supplier</p>
                    <input type="text" name="supplier" class="input-control" placeholder="Supplier" required>
                    <p>Stok</p>
                    <input type="number" name="stok" class="input-control" id="Stok" min="0" max="999"
                        placeholder="Stok Barang" required>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
               if(isset($_POST['submit'])){

              //  print_r($_FILES['foto']); //

              //menampung input dari form//
              $kategori   = $_POST['kategori'];
              $nama       = $_POST['nama'];
              $harga      = $_POST['harga'];
              $deskripsi   = $_POST['deskripsi'];
              $supplier  = $_POST['supplier'];
              $stok  = $_POST['stok'];
              //Menampung data file yang diupload//
              $filename = $_FILES['foto']['name'];
              $tmp_name = $_FILES['foto']['tmp_name'];

              $type1 = explode('.', $filename);
              $type2 = $type1[1];
              $newname = 'produk' .time().'.'.$type2;

              //Menampung data format file yang diijinkan//
                 
                $tipe_diijinkan = array('jpg', 'jpeg', 'png', 'webp');            
              //Validasi format file//
               if(!in_array($type2, $tipe_diijinkan)){
                //jika format file tidak diijinkan //
                echo '<script>alert("Format file tidak diizinkan"</script>';
               }else{
                //jika format file sesuai dengan yang ada di dalam array tipe diijinkan //
              //proses upload file sekaligus insert database//
              move_uploaded_file($tmp_name, './produk/' .$newname);

             $insert = mysqli_query($koneksi, "INSERT INTO master (
    id_kategori,
    nama,
    harga,
    deskripsi,
    foto,
    stok,
    supplier
) VALUES (
    '".$kategori."',
    '".$nama."',
    '".$harga."',
    '".$deskripsi."',
    '".$newname."',
    '".$stok."',
    '".$supplier."'
)");



                 if($insert){
                    echo '<script>alert("Tambah data berhasil")</script>';
                    echo '<script>window.location="data-produk.php"</script>';
                    
                 }else{
                    echo 'gagal' .mysqli_error($koneksi);
                 }
               }
           
           
            }
            ?>

            </div>
            <script>
            // Input Element
            var input = document.getElementById("Stok");
            var lastValidValue = input.value;

            // Event Listener
            input.addEventListener("input", function() {
                // Menghilangkan yang bukan angka numerik
                input.value = input.value.replace(/[^0-9.]/g, '');

                // Parsing input value menjadi float
                var value = parseFloat(input.value);

                // Memeriksa apakah input value sesuai dengan range
                if (value >= parseFloat(input.min) && value <= parseFloat(input.max)) {
                    // Jika iya, maka update angka valid terakhir\
                    lastValidValue = input.value;
                } else {
                    // Jika tidak dan input value tidak kosong, Jadikan input value sebagai input value terakhir yang valid
                    if (input.value !== "") {
                        input.value = lastValidValue;
                    }
                }
            });
            </script>
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