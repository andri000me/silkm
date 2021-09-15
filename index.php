<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    require 'functions.php';
    $mahasiswa = query("SELECT * FROM mahasiswa");
    if (isset($_POST["cari"])) {
        $mahasiswa = cari($_POST["keyword"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/img/icons/favicon.ico">
        <title>SILKM - JTIF UNESA</title>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <!-- Icon Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <!-- AOS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <!-- Java Script from assets -->
        <script src="assets/js/script.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="text-center mb-4 mt-4 pb-5 pt-4">Sistem Informasi <i>Log Book</i> Kampus Merdeka</h1>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4 col-sm-6">
                        <form class="d-flex" method="post">
                        <input class="form-control me-2" type="search" name="keyword" autofocus placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit" name="cari">Search</button>
                        </form>
                        <!--
                            <form action="" method="post">
                            <input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian.." autocomplete="off">
                            <button type="submit" name="cari">Cari!</button>
                            </form>
                        -->
                </div>
                <div class="col-md-8 col-sm-6 text-end">
                    <a href="logout.php" class="btn btn-outline-danger btn" tabindex="-1" role="button" aria-disabled="true"><i class="bi bi-box-arrow-left"></i>&nbsp;&nbsp;logout</a>      
                    <a href="tambah.php" class="btn btn-outline-success btn" tabindex="-1" role="button" aria-disabled="true"><i class="bi bi-person-plus"></i>&nbsp;&nbsp;Tambah Data</a>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md col-sm">
                    <table class="table table-primary table-hover" border="1" cellpadding="10" cellspacing="0">
                        <thead class="">
                            <tr>
                                <th>Pertemuan</th>
                                <th>Tgl</th>
                                <th>Pukul</th>
                                <th>Judul Kegiatan</th>
                                <th>Sub Bahasan</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody?>
                            <?php $i = 1; ?>
                            <?php foreach($mahasiswa as $row) :?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row["tanggal"]; ?></td>
                                <td><?= $row["pukul"]; ?></td>
                                <td><?= $row["judul"]; ?></td>
                                <td size="50"><?= $row["sub"]; ?></td>
                                <td><img src="assets/img/data-upload-gambar/<?= $row ["gambar"]; ?>" width="50" alt=""></td>
                                <td>
                                    <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-outline-success"><i class="bi bi-pencil-square"></i></a>
                                    <a href="hapus.php?id=<?= $row["id"]; ?>" class="btn btn-outline-danger" id="hapus" onclick= "return confirm('Apakah yakin ingin menghapus data, <?= $row["judul"];?>?');"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
        <!-- Sweet Alert -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
</html>