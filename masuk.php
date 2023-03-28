<?php
// menghubungkan ke database
include 'koneksi.php';

// cek error
error_reporting(0);

// session awal
session_start();

// cek session login berdasarkan username ==>> atabase
if (isset($_SESSION['username'])){
    header("Location: index.php");
}

// cek akun supaya bisa login
if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // query/ambil datanya dari database
    $sql = "SELECT * FROM user WHERE email='$email' AND password = '$password'";
    $result = mysqli_query($koneksi, $sql);
    if ($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: index.php");
    } else {
        echo "<script>alert('Email atau Password Anda Salah. Silahkan coba lagi!')</script>";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="index.css">
  <title>Login</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="" method="post">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" required name="email" value="<?= $email; ?>">
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required name="password" value="<?= $_POST['password']; ?>">
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Ingatkan saya jika  <a href="#">Lupa Password</a></label>
                      
                    </div>
                    <button type="submit" name="login">Log in</button>
                    <div class="register">
                        <p>Belum Punya Akun? Klik <a href="daftar.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>