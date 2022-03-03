<?php
require("koneksi.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/bootstrap.css">
    <link rel="stylesheet" href="asset/stylesheet.css">
    <title>Nota</title>
</head>

<body>
    <!-- header -->
    <?php require("menu.php") ?>

    <section class="konten">
        <div class="container">

            <!-- nota disini copas dari nota yang ada di admin -->
            <h2>Detail Pembelian</h2>

            <?php $ambil = $conn->query("SELECT * FROM pembelian JOIN pelanggan 
            ON pembelian.id_pelanggan=pelanggan.id_pelanggan
            WHERE pembelian.id_pembelian='$_GET[id]'");
            $detail = $ambil->fetch_assoc();

            ?>

            <!-- Jika pelanggan yang beli tidak sama dengan pelanggan yang logi
            maka dilarikan ke riwayat .php karena tidak berhak melihat nota orang lain -->
            <!-- pelanggan yang beli harus pelanggan login -->
            <?php
            //mendapatkan id_pelanggan yang beli
            $idpelangganyangbeli = $detail["id_pelanggan"];
            //mendapatkan id_pelanggan yang login
            $idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

            if ($idpelangganyangbeli !== $idpelangganyanglogin) {
                echo "<script>alert('Kamu jangan nakal ya!');</script>";
                echo "<script>location='riwayat.php';</script>";
                exit();
            }

            ?>

            <div class="row">
                <div class="col-md-4">
                    <h3>Pembelian</h3>
                    <strong>No. Pembelian <?php echo $detail['id_pembelian'] ?> </strong><br>
                    Tanggal:<?php echo $detail['tanggal_pembelian']; ?><br>
                    Total: Rp. <?php echo number_format($detail['total_pembelian']); ?>
                </div>
                <div class="col-md-4">
                    <h3>Pelanggan</h3>
                    <strong><?php echo $detail['nama_pelanggan']; ?></strong>
                    <p>
                        <?php echo $detail['telp_pelanggan']; ?><br>
                        <?php echo $detail['email_pelanggan']; ?><br>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Pengriman</h3>
                    <strong><?php echo $detail['nama_pengiriman'] ?></strong><br>
                    Ongkos Kirim : Rp. <?php echo number_format($detail['tarif']); ?><br>
                    Alamat : <?php echo $detail['alamat_pengiriman']; ?>
                </div>
            </div>

            <table class="table table-bordered">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $ambil = $conn->query("SELECT * FROM pembelian_produk JOIN produk On
                    pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
                    <?php while ($row = $ambil->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $row['nama_produk']; ?></td>
                            <td>Rp. <?php echo number_format($row['harga_produk']); ?></td>
                            <td><?php echo $row['jumlah']; ?></td>
                            <td>Rp. <?php echo number_format($row['harga_produk'] * $row['jumlah']); ?></td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-7">
                    <div class="alert alert-info">
                        <p>
                            Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> Ke <br>
                            <strong>BANK BCA 142-004066-3276 AN. Saeful Pamungkas</strong> atau <br>
                            <strong>BANK BRI 142-004066-3276 AN. Saeful Pamungkas</strong>
                        <p>Untuk konfirmasi pembayaran silahkan masuk ke menu riwayat!!</p>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <?php require('footer.php') ?>
</body>

</html>