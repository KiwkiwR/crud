<?php
// koneksi ke database
include "koneksi.php";

// get data dari form edit
$id = $_POST['id'];
$nisn = $_POST['nisn'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$email = $_POST['email'];
$gambar = $_POST['gambar'];

// update data berdasarkan id
$query = "UPDATE siswa SET
    nisn = '$nisn',
    nama = '$nama',
    jurusan = '$jurusan',
    email = '$email',
    gambar = '$gambar'
    WHERE id = $id
";

// cek
if($koneksi->query($query)) {
    header("location: index.php");
}else{
    echo "Data gagal";
}


?>