<?php
// sambungkan ke database
include 'koneksi.php';

// data sesuai tabel
$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);

// enkripsi password
$password = md5($password);

// tambahkan data registrasi
$query = "INSERT INTO user (username, email, password) VALUES
        ('$username', '$email', '$password')";

// cek jika berhasil atau gagal
if(mysqli_query($koneksi, $query)){
    echo "<h1>Email $email Berhasil Didaftarkan</h1>
    <a href='masuk.php'>Silahkan Klik Disini Untuk Login</h1>
    ";
}else{
    echo "Registrasi akun Gagal : " . mysqli_error($koneksi);
}


?>