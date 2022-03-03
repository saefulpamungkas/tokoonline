<?php
session_start();
require("koneksi.php");
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/style.css">
    <link rel="stylesheet" href="../asset/fontawesome-free-6.0.0/css/all.min.css">

    <title>Hello, world!</title>
</head>

<body>
    <!-- Header navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="../index.php"><i class="fas fa-store pr-2"></i>TOKOTUKU</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mr-4">
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="../index.php">HOME <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="kategori.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            KATEGORI
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Cannon</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Sony</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Fujifilm</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Canon</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link text-white" href="../keranjang.php">KERANJANG</a></li>

                    <!-- jika sudah login(ada session pelanggan) -->
                    <?php if (isset($_SESSION["pelanggan"])) : ?>
                        <li class="nav-item"><a class="nav-link text-white" href="../riwayat.php">RIWAYAT</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="../checkout.php">CHECKOUT</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="../logout.php">LOGOUT</a></li>
                        <!-- selain itu (blum login|| ada session pelanggan) -->
                    <?php else : ?>
                        <li class="nav-item"><a class="nav-link text-white" href="login.php">LOGIN</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="../daftar.php">DAFTAR</a></li>
                    <?php endif ?>
                    <li class="nav-item"><a class="nav-link text-white" href="../about us.php">ABOUT US</a></li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="asset/js/jquery-3.3.1.slim.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
</body>

</html>