<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Jepunmart</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    </head>
    
    <body id="login-bg">
    <div class="login-box">
        <h1>Login</h1>
        <form action="" method="POST">
              <input type="text" name="user" placeholder="Username" class="input-control">
              <input type="password" name="pass" placeholder="Password" class="input-control">
              <input type="submit" name="submit" value="Login" class="btn">
            </form>
            <?php
            if(isset($_POST['submit'])){
                session_start();
            include 'koneksi.php';

            $user = mysqli_real_escape_string($koneksi, $_POST['user']);
            $pass = mysqli_real_escape_string($koneksi, $_POST['pass']);

            $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '".$user."' AND password = '".$pass."'");
            if(mysqli_num_rows($cek)> 0){
                $d =  mysqli_fetch_object($cek);
                $_SESSION['status_login'] = true;
                $_SESSION['a_global'] = true;
                $_SESSION['id'] = $d->id;
               echo '<script>window.location="dashboard.php"</script>';
            }else{
                echo '<script>alert("Username atau Password salah! Silahkan Coba lagi")</script>';
            }
            }
        
            ?>
    </div>
</body>
</html>