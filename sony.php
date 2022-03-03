<?php
require("koneksi.php");

?>

<?php
$keyword = "Sony";

$semuadata = array();
$ambil = $conn->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'
OR deskripsi_produk LIKE '%$keyword%'");
while ($row = $ambil->fetch_assoc()) {
    $semuadata[] = $row;
}

// echo "<pre>";
// print_r($semuadata);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/bootstrap.css">
    <link rel="stylesheet" href="asset/style.css">
    <title>pencarian</title>
</head>

<body>
    <?php require("menu.php") ?>

    <div class="container mt-5 pt-5">
        <div class="judul">
            <h3>Kategori Kamera <?php echo $keyword ?></h3>
            <hr class="my-4">
        </div>
    </div>


    <div class="container expand-lg mb-5">

        <?php if (empty($semuadata)) : ?>
            <div class="alert alert-danger">kategori produk <?php echo $keyword ?> tidak ditemukan</div>
        <?php endif ?>
        <div class="row mx-auto">

            <?php foreach ($semuadata as $key => $value) : ?>
                <div class="col-md-3">
                    <div class="card mr-2 mt-2" style="width: 16rem">
                        <img src="foto_produk/<?php echo $value["foto_produk"] ?>" class="card-img-top">
                        <div class="card-body bg-light">
                            <h3 class="card-title"><?php echo $value["nama_produk"] ?></h3>
                            <h5 class="card-text">Rp. <?php echo number_format($value['harga_produk']) ?></h5>
                            <a href="beli.php?id=<?php echo $value["id_produk"]; ?>" class="btn btn-danger">Beli</a>
                            <a href="detail.php?id=<?php echo $value["id_produk"]; ?>" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
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