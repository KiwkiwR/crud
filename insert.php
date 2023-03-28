<?php
// sambungin ke database
include "koneksi.php";

// menangkap data yg dikirim / diinput dihalaman form
$nisn = $_POST['nisn'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$email = $_POST['email'];

// upload gambar
$rand = rand(); //bisa mengambil img dimana aja
$ekstensi = array('png', 'jpg', 'jpeg', 'img', 'gif'); //ekstensi gambar yg bisa diupload
$filename = $_FILES['gambar']['name']; //cek sesuai database
$ukuran = $_FILES['gambar']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext, $ekstensi)){
    header("location:index.php?alert=gagal_ekstensi");
}else{
    if($ukuran < 1044070){
        $gambar = $rand.'_'.$filename;
        move_uploaded_file($_FILES['gambar']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
        header("location:index.php?alert=berhasil");
    }else{
        header("localtion:index.php?alert=gagal_ukuran");
    }
}







// menyimpan data kedalam tabel siswa / database
$ambil = mysqli_query($koneksi, "INSERT INTO siswa VALUE(
    '',
    '$nisn',
    '$nama',
    '$jurusan',
    '$email',
    '$gambar'
)");

// Mengalihkan halaman setelah data berhasil ditambahkan
header("location:index.php");
?>