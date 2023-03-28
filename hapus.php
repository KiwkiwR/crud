<?php
// Menghubungkan ke database
include "koneksi.php";

// tampung data yg akan dihapus berdasarkan id
$id = $_GET['id'];

// menghapus data dari database
mysqli_query($koneksi, "DELETE FROM siswa WHERE id='$id'");

// alihkan halaman setelah di hapus
header("location:index.php");
?>