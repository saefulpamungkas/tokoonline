<?php
session_start();
require("koneksi.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Home</title>
</head>

<body>
    <!-- header dan Navbar-->
    <?php require 'menu.php' ?>

    <!-- slider -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="1000">
                <img src="foto/slide1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-interval="1000">
                <img src="foto/slide2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-interval="1000">
                <img src="foto/slide3.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Kontent -->

    <div class="container">

        <div class="judul">
            <h2>PRODUK KAMI</h2>
            <hr class="my-4">
        </div>
    </div>

    <div class="container expand-lg mb-5">
        <div class=" row mx-auto">
            <?php $ambil = $conn->query("SELECT * FROM produk"); ?>
            <?php while ($satuproduk = $ambil->fetch_assoc()) { ?>
                <div class="col-lg-3">
                    <div class="card mr-2 mt-2" style="width: 16rem">
                        <img src="foto_produk/<?php echo $satuproduk['foto_produk']; ?>" class="card-img-top">
                        <div class="card-body bg-light">
                            <h3 class="card-title"><?php echo $satuproduk['nama_produk']; ?></h3>
                            <h5 class="card-text">Rp. <?php echo number_format($satuproduk['harga_produk']); ?></h5>
                            <a href="beli.php?id=<?php echo $satuproduk['id_produk'] ?>" class="btn btn-danger">Beli</a>
                            <a href="detail.php?id=<?php echo $satuproduk['id_produk']; ?>" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>


    <?php require("footer.php") ?>


</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="asset/js/jquery-3.3.1.slim.min.js"></script>
<script src="asset/js/popper.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>


</html>