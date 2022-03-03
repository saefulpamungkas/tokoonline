<?php
require('koneksi.php');
session_start();

//mendapatkan id_produk dari url
$id_produk = $_GET["id"];

//qurery ambil data
$ambil = $conn->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
$detail = $ambil->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/style.css">
    <link rel="stylesheet" href="asset/fontawesome-free-6.0.0/css/all.min.css">
    <title>Detail</title>
</head>

<body>
    <!-- header -->
    <?php require 'menu.php' ?>

    <!-- Content -->
    <div class="konten">
        <div class="container">
            <div class="row mx-auto">
                <div class="card col-md-6">
                    <img src="foto_produk/<?php echo $detail['foto_produk']; ?>" class="img-responsive col-lg-6">
                </div>
                <div class=" col-md-6">
                    <h2><?php echo $detail['nama_produk']; ?></h2>
                    <h4>Rp. <?php echo number_format($detail['harga_produk']); ?></h4>

                    <h5>Stok: <?php echo $detail['stok_produk'] ?></h5>

                    <form action="" method="POST">
                        <div class="form-group">
                            <h5>Jumlah item:</h5>
                            <div class="input-group">
                                <input type="number" class="form-control" name="jumlah" min="1">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" name="beli">Beli</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php
                    //jika ada tobol beli
                    if (isset($_POST["beli"])) {
                        //mendapatkan jumlah yang diinputkan
                        $jumlah = $_POST['jumlah'];
                        //masukan dikeranjang belanja
                        $_SESSION['keranjang'][$id_produk] = $jumlah;

                        echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
                        echo "<script>location='keranjang.php';</script>";
                    }
                    ?>
                    <h4>Deskripsi Produk</h4>
                    <?php echo $detail['deskripsi_produk']; ?>
                </div>
            </div>
        </div>
    </div>


    <div class="message-wrapper">
        <br><br><br><br>
        <br><br><br><br>
    </div>

    <?php require("footer.php") ?>
</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="asset/js/jquery-3.3.1.slim.min.js"></script>
<script src="asset/js/popper.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>

</html>