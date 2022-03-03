<?php
session_start();
require("koneksi.php");
$id_pembelian = $_GET["id"];

$ambil = $conn->query("SELECT * FROM pembayaran LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian
WHERE pembelian.id_pembelian='$id_pembelian'");
$detail_bay = $ambil->fetch_assoc();

//jika belum ada data pelanggan
if (empty($detail_bay)) {
    echo "<script>alert('Belum ada data pembayaran')</script>";
    echo "<script>location='riwayat.php'</script>";
    exit();
}

//jika data pelanggan yang bayar tidak sesuai
if ($_SESSION["pelanggan"]['id_pelanggan'] !== $detail_bay["id_pelanggan"]) {
    echo "<script>alert('Ada tidak berhak melihat pembayaran orang lain')</script>";
    echo "<script>location='riwayat.php'</script>";
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
    <link rel="stylesheet" href="asset/style.css">
    <title>Lihat Pembayaran</title>
</head>

<body>

    <?php require("menu.php") ?>

    <div class="container mt-5 mb-5">
        <h3>Lihat Pembayaran</h3>
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <td><?php echo $detail_bay['nama'] ?></td>
                    </tr>
                    <tr>
                        <th>Bank</th>
                        <td><?php echo $detail_bay['bank'] ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td><?php echo $detail_bay['tanggal'] ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>Rp. <?php echo number_format($detail_bay['jumlah']) ?></td>
                    </tr>
                </table>
            </div>
            <img src="bukti_pembayaran/<?php echo $detail_bay["bukti"] ?>" alt="resi.jpg" class="img-resposive" style="width: 500px; height:500px">
        </div>
    </div>

    <?php require("footer.php") ?>
</body>

</html>