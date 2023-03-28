<?php
    // koneksi ke database
    include "koneksi.php";

    // inisialisasi berdasarkan id
    $id = $_GET['id'];

    // kelola data
    $query = "SELECT * FROM siswa WHERE id = $id";

    // ambil data
    $ambil = mysqli_query($koneksi, $query);

    // tampilkan data
    $tampil = mysqli_fetch_array($ambil);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Siswa | PHP Dasar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1>Form Edit Data Siswa</h1>
        <a href="index.php" class="btn btn-warning">Kembali</a>

        <!-- form start -->
        <form action="update.php" method="post">
            <div class="mb-3">
                <input type="hidden" name="id" value="<?= $tampil['id'];?>">
                <label for="" class="form-label">Nisn</label>
                <input type="text" class="form-control" name="nisn" required value="<?= $tampil['nisn'];?>">
                <label for="" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" required value="<?= $tampil['nama'];?>">
                <label for="" class="form-label">Jurusan</label>
                <input type="text" class="form-control" name="jurusan" required value="<?= $tampil['jurusan'];?>">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required value="<?= $tampil['email'];?>">
                <label for="" class="form-label">Gambar</label>
                <input type="file" class="form-control" name="gambar" required value="<?= $tampil['gambar'];?>">
                <button class="btn btn-success">Simpan Data!</button>
            </div>
        </form>
        <!-- form end -->
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>