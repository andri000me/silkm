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
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <!-- Icon Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <!-- AOS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    </head>
    <body>
        <img class="wave" src="assets/img/wave.svg">
        <div class="container">
            <div class="img">
                <img src="assets/img/ilustrasi-jtif-a10.svg">
            </div>
            <div class="login-container">
                <form action="index.php">
                    <img class="avatar" src="assets/img/user.svg">
                    <h2>Masuk</h2>
                    <div class="input-div one">
                        <div class="i">
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <div>
                            <h5>Username</h5>
                            <input class="input" type="text">
                        </div>
                    </div>
                    <div class="input-div two">
                        <div class="i">
                            <i class="bi bi-key"></i>
                        </div>
                        <div>
                            <h5>Password</h5>
                            <input class="input" type="password">
                        </div>
                    </div>
                    <a href="#">Forgot Password?</a>
                    <input class="btn" type="submit" value="Login">
                </form>
            </div>
        </div>
        <!-- Java Script from assets -->
        <script src="assets/js/main.js"></script>
    </body>
</html>