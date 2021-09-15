<?php
    require 'functions.php';
    if(isset($_POST["register"])) {
        if(registrasi($_POST) > 0) {
            echo "
                <script>
                    alert('berhasil ditambahkan!');
                </script>";
        } else {
            echo mysqli_error($db);
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
        <title>Registrasi - SILKM</title>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <!-- Icon Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <!-- AOS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <!-- Java Script from assets -->
        <script src="assets/js/script.js"></script>
        <style>
            label {
                display: block;
            }
        </style>
    </head>
    <body class="bg-dark">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <h1 class="text-center mb-4 mt-5 pb-4 pt-5 text-uppercase fs-2 fw-bold text-primary">Registrasi SILKM</h1>
                    <form class="row justify-content-md-center g-3 mb-4 pb-4" action="" method="post">
                        <div class="col-md-6">
                            <label class="form-label" for="nama">Nama :</label>
                            <input class="form-control" type="text" name="nama" id="nama" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="nim">NIM :</label>
                            <input class="form-control" type="text" name="nim" id="nim" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="prodi">Prodi :</label>
                            <!-- <input class="form-control" type="text" name="prodi" id="prodi"> -->
                            <select class="form-select" name="prodi" id="prodi" required>
                                <option value="TI">S1 - Teknik Informatika</option>
                                <option value="SI">S1 - Sistem Informasi</option>
                                <option value="PTI">S1 - Pendidikan Teknologi Informasi</option>
                                <option value="MI">D4 - Manajemen Informatika</option>
                            </select>        
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="angkatan">Angkatan :</label>
                            <select class="form-select" name="angkatan" id="angkatan" required>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2019">2020</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="email">Email :</label>
                            <input class="form-control" type="text" name="email" id="email" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="program">Program KM :</label>
                            <input class="form-control" type="text" name="program" id="program" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="perusahaan">Tempat Kampus Merdeka :</label>
                            <input class="form-control" type="text" name="perusahaan" id="perusahaan" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="password">Kata Sandi :</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="password2">Ulangi Kata Sandi :</label>
                            <input class="form-control" type="password" name="password2" id="password2" required>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-outline-primary" type="submit" name="register">Registrasi Sekarang</button>
                            <div class="form-text mt-3"><a href='/silkm/login.php'><i>Sudah punya akun?</i></a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>