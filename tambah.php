<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    require 'functions.php';
    if(isset($_POST["submit"])) {
        if(tambah($_POST) > 0){
            echo "
                <script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'index.php'
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal ditambahkan!');
                    document.location.href = 'index.php'
                </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/img/icons/favicon.ico">
        <title>Tambah data - SILKM</title>
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
            <div class="row justify-content-md-center">
                <div class="col-md-5">
                    <h1 class="text-center mb-4 mt-5 pb-4 pt-5">Tambah data</h1>
                    <form class="row justify-content-md-center g-3 mb-4 pb-4" action="" method = "post" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <label class="form-label" for="tanggal">Tanggal:  </label>    
                            <input class="form-control" type="date" name="tanggal" id="tanggal" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="pukul">Pukul:  </label>    
                            <input class="form-control" type="time" name="pukul" id="pukul" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="judul">Judul Kegiatan:  </label>    
                            <input class="form-control" type="text" name="judul" id="judul" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="sub">Sub Bahasan:  </label>    
                            <input class="form-control" type="text" name="sub" size="100" id="sub" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="gambar" class="form-label">Gambar :</label>
                            <input class="form-control" type="file" name="gambar" id="gambar" required>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-outline-success" type="submit" name="submit">Tambah Data!</button>
                        </div>
                        <div class="d-grid mt-2">
                            <a href="/silkm/index.php" class="btn btn-outline-secondary" tabindex="-1" role="button" aria-disabled="false">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>