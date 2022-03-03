<?php
session_start();
require("koneksi.php");

//jika tidak ada session pelanggan (blum login)
if (!isset($_SESSION["pelanggan"]) or empty($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
}


//mendapatkan id_pembelian dari url
$idpem = $_GET["id"];
$ambil = $conn->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detail_pem = $ambil->fetch_assoc();

//mendapatkan id_pelanggan yang beli
$id_pelanggan_beli = $detail_pem["id_pelanggan"];
//mendapatkan id_pelanggan yang login
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if ($id_pelanggan_login !== $id_pelanggan_beli) {
    echo "<script>alert('Kamu jangan nakal ya!'); </script>";
    echo "<script>location='login.php'; </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/bootstrap.css">
    <link rel="stylesheet" href="asset/stylesheet.css">
    <link rel="stylesheet" href="asset/style.css">
    <title>Home</title>
</head>

<body>
    <!-- header dan Navbar-->
    <?php require("menu.php"); ?>

    <div class="container mt-5 mb-5">
        <h2>Konfirmasi Pebayaran</h2>
        <p>Kirim bukti pembayaran</p>
        <div class="alert alert-info">Total tagihan Anda <strong>Rp. <?php echo number_format($detail_pem["total_pembelian"]); ?></strong></div>

        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Penyetor</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label>Bank</label>
                <input type="text" class="form-control" name="bank">
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" class="form-control" name="jumlah" min="1" placeholder="Masukan nominal angka">
            </div>
            <div class="form-group">
                <label>Foto Bukti</label>
                <input type="file" class="form-control" name="bukti">
                <p class="text-danger">Foto bukti harus JPG/PNG maksimal 2mb</p>
            </div>
            <button class="btn btn-primary" name="kirim">Kirim</button>
        </form>
    </div>

    <?php
    //jika ada tombol kirim
    if (isset($_POST['kirim'])) {
        //upload dulu foto bukti
        $namabukti = $_FILES["bukti"]["name"];
        $lokasibukti = $_FILES["bukti"]["tmp_name"];
        $namafiks = date("YmdHis") . $namabukti;
        move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

        $nama = $_POST["nama"];
        $bank = $_POST["bank"];
        $jumlah = $_POST["jumlah"];
        $tanggal = date("Y-m-d");

        $conn->query("INSERT INTO pembayaran (id_pembelian,nama,bank,jumlah,tanggal,bukti)
        VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks')");

        //update data pembelian dari pending menjaddi sudah kirim pembayaran
        $conn->query("UPDATE pembelian SET status_pembelian='Sudah saya kirim pembayaran' 
        WHERE id_pembelian = '$idpem'");

        echo "<script>alert('Terimakasih sudah mengirim bukti pembayaran'); </script>";
        echo "<script>location='riwayat.php'; </script>";
    }

    ?>

    <?php require("footer.php") ?>

</body>

</html>