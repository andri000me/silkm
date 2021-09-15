<?php
    session_start();
    require 'functions.php';
    if(isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];
        $result = mysqli_query($db, "SELECT nim FROM user WHERE id = $id");
        $row = mysqli_fetch_assoc($result);
        if($key === hash('sha256', $row['nim'])) {
            $_SESSION['login'] = true;
        }
    }
    if (isset($_SESSION["login"])) {
        header("Location: index.php");
        exit;
    }
    if (isset($_POST["login"])){
        $nim = $_POST["nim"];
        $password = $_POST["password"];
        $result = mysqli_query($db, "SELECT * FROM user WHERE nim = '$nim'");

        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row["password"])) {
                $_SESSION["login"] = true;
                    if(isset($_POST['remember'])) {
                        setcookie('id', $row['id'], time() + 86400);
                        setcookie('key', hash('sha256', $row['nim'], time() + 86400));
                    }
                header("Location: index.php");
                exit;
            }
        }
        $error = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Masuk - SILKM</title>
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
                <div class="col-4">
                    <h1 class="text-center mb-4 mt-5 pb-4 pt-5">Masuk SILKM</h1>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM : </label>
                            <input type="text" class="form-control" name="nim" id="nim" aria-describedby="ket-email" required>
                            <div id="ket-email" class="form-text"><i>We'll never share your NIM or Password with anyone else.</i></div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi : </label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember">
                            <label for="remember" class="form-check-label">Ingat saya.</label>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="login" class="btn btn-outline-success">Masuk</button>
                        </div>
                        <div class="d-grid mt-2">
                            <a href="/silkm/registrasi.php" class="btn btn-outline-primary" tabindex="-1" role="button" aria-disabled="false">Daftar</a>
                        </div>
                        <div class="mb-3">
                            <?php if(isset($error)) : ?>
                            <br>
                            <p style="color: red; font-style: italic;">Username / password yang Anda masukkan salah!</p>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>