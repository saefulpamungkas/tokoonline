<?php
session_start();
require("koneksi.php");
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login admin</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/style.css">
    <link rel="stylesheet" href="../asset/fontawesome-free-6.0.0/css/all.min.css">

</head>

<body>

    <!-- header -->

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
        <link rel="stylesheet" href="stylesheet.css">
        <link rel="stylesheet" href="../asset/login.css">
        <title>Home</title>
    </head>

    <body>
        <!-- header -->
        <?php require("menu.php") ?>

        <div class="konten mx-auto mb-5" style="width: 400px;">
            <div class="container">
                <h4 class="text-center">FORM ADMIN</h4>
                <form role="form" method="POST">
                    <div class="form-group">
                        <label>Username</label>
                        <div class="input-group">
                            <div aria-valuemax="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope pt-1 pb-1"></i></div>
                            </div>
                            <input type="text" name="user" class="form-control" placeholder="Masukan username anda">
                        </div>

                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-group">
                            <div aria-valuemax="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-lock pt-1 pb-1"></i>
                                </div>
                            </div>
                            <input type="password" name="pass" class="form-control" placeholder="Masukan password anda">
                        </div>
                    </div>
                    <button class="btn btn-primary" name="login">SUBMIT</button>
                    <button type="riset" class="btn btn-danger">RESET</button><br><br>
                    Belum punya akun ? <a href="../daftar.php">click here </a><br>
                    Anda pengunjung ? <a href="../login.php">click here </a>

                    <?php
                    if (isset($_POST['login'])) {
                        $ambil = $conn->query("SELECT * FROM admin WHERE username='$_POST[user]'
                            AND password ='$_POST[pass]'");
                        $cek = $ambil->num_rows;
                        if ($cek == 1) {
                            $_SESSION['admin'] = $ambil->fetch_assoc();
                            echo "<div class='alert alert-info'>Login sukses</div>";
                            echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                        } else {
                            echo "<div class='alert alert-danger'>Login gagal</div>";
                            echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                        }
                    }
                    ?>
                </form>
            </div>
        </div>

        <?php require("../footer.php") ?>

        <script src="../asset/js/jquery-3.3.1.slim.min.js"></script>
        <script src="../asset/js/popper.min.js"></script>
        <script src="../asset/js/bootstrap.min.js"></script>
    </body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="asset/js/jquery-3.3.1.slim.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>

</html>