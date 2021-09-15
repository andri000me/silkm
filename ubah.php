<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    require 'functions.php';
    $id = $_GET["id"];
    $mhs = query("SELECT * FROM mahasiswa WHERE id = $id") [0];
    if(isset($_POST["submit"])){
        if(ubah($_POST) > 0){
            echo "
                <script>
                    alert('Data berhasil diubah!');
                    document.location.href = 'index.php';
                </script>        
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal diubah!');
                    document.location.href = 'index.php';
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
        <title>Edit data</title>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <!-- Icon Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-5">
                    <h1 class="text-center mb-4 mt-5 pb-4 pt-5">Edit data</h1>
                    <form class="row justify-content-md-center g-3 mb-4 pb-4" action="" method = "post" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <input class="form-control" type="hidden" name="id" value="<?= $mhs["id"]; ?>">
                            <input class="form-control" type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="tanggal">Tanggal:  </label>    
                            <input class="form-control" type="date" name="tanggal" id="tanggal" value="<?= $mhs ["tanggal"]; ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="pukul">Pukul:  </label>    
                            <input class="form-control" type="time" name="pukul" id="pukul" required value="<?= $mhs ["pukul"]; ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="judul">Judul Kegiatan :</label>    
                            <input class="form-control" type="text" name="judul" id="judul" value="<?= $mhs ["judul"]; ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="sub">Sub Bahasan:  </label>    
                            <input class="form-control" type="text" name="sub" id="sub" value="<?= $mhs ["sub"]; ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="gambar">Gambar:  </label> <br>
                            <input class="form-control" type="file" name="gambar" id="gambar" >
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-outline-primary" type="submit" name="submit">Edit Data!</button>
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