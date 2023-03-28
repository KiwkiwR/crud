<?php
    include "koneksi.php";

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Belajar PHP Dasar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <a href="index.php"><h1>Daftar Siswa SMK TI Annisa 2</h1></a>
        <a href="tambah.php" class="btn btn-primary">Tambah Data</a>
        <a href="logout.php" class="btn btn-primary">Logout!</a>
        <br>
        <br>
        <form class="d-flex" role="search" action="index.php" method="GET">
            <input class="form-control me-2" type="search" placeholder="Cari berdasarkan nama.." aria-label="Search" name="cari">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <br>   

        <!-- tabel start -->
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nisn</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Email</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    // proses upload gambar
                    if(isset($_GET['alert'])){
                        if($_GET['alert']=='gagal_ekstensi'){
                            ?>
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <h4><i class="icon fa fa-warning">Peringatan!</i></h4>
                                Ekstensi tidak diperbolehkan
                            </div>
                            <?php
                        }elseif($_GET['alert']=="gagal_ukuran"){
                            ?>
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <h4><i class="icon fa fa-warning">Peringatan!</i></h4>
                                Ukuran file terlalu besar
                            </div>
                            <?php
                        }elseif($_GET['alert']=="berhasil"){
                            ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <h4><i class="icon fa fa-success">Berhasil!</i></h4>
                                Gambar berhasil disimpan
                            </div>
                            <?php
                        }
                    }

                    // proses pencarian
                    if(isset($_GET['cari'])) {
                        $cari = $_GET['cari'];
                        $ambil = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nama LIKE '%".$cari."%'");
                    }else{
                        $ambil = mysqli_query($koneksi, "SELECT * FROM siswa");
                    }
                    // ambil data pada tabel siswa
                    $no=1;
                    // tampilkan data dari tabel siswa
                    while($tampil = mysqli_fetch_array($ambil)){
                ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $tampil['nisn']; ?></td>
                    <td><?= $tampil['nama'];?></td>
                    <td><?= $tampil['jurusan'];?></td>
                    <td><?= $tampil['email'];?></td>
                    <td><img src="gambar/<?= $tampil['gambar'];?>" width="100" height="115"> </td>
                    <td>
                        <a href="edit.php?id=<?= $tampil['id'];?>" class="btn btn-success">Edit</a>
                        <a href="hapus.php?id=<?= $tampil['id'];?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                    <?php
                    }
                    ?>
            </tbody>
        </table>
        
        <!-- tabel end -->
    </div>
    <!-- <div style="position:absolute;top:0;bottom:0;left:0;right:0;background-color:black;font-size:100px;color:red;text-align:center;">HAHAHA DATA ANDA SUDAH KAMI SADAP, HUBUNGI KE NOMOR INI UNTUK NEGOSIASI PENGEMBALIAN DATA</div> -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>