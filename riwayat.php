<?php
session_start();
require("koneksi.php");

//jika tidak ada session pelanggan (blum login)
if (!isset($_SESSION["pelanggan"]) or empty($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/asset/css/bootstrap.css">
    <link rel="stylesheet" href="asset/stylesheet.css">
    <link rel="stylesheet" href="asset/style.css">
    <title>Riwayat</title>
</head>

<body>
    <!-- header dan Navbar-->
    <?php require("menu.php") ?>

    <body>
        <section class="riwayat">
            <div class="container">
                <h3>Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?> </h3>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        //mendapatkan id_pelanggan yang login dari session
                        $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
                        $ambil = $conn->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
                        while ($row = $ambil->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $row["tanggal_pembelian"] ?></td>
                                <td><?php echo $row["status_pembelian"] ?>
                                    <br>
                                    <?php if (!empty($row['resi_pengiriman'])) : ?>
                                        Resi: <?php echo $row['resi_pengiriman'] ?>
                                    <?php endif ?>
                                </td>

                                <td>Rp. <?php echo number_format($row["total_pembelian"]) ?></td>
                                <td>
                                    <a href="nota.php?id=<?php echo $row["id_pembelian"] ?>" class=" btn btn-info"><i class="fas fa-receipt"></i> Nota</a>
                                    <?php if ($row['status_pembelian'] == "pending") : ?>
                                        <a href="pembayaran.php?id=<?php echo $row["id_pembelian"]; ?>" class="btn btn-success"><i class="fas fa-money-bill-wave"></i>
                                            Input Pembayaran
                                        </a>
                                    <?php else : ?>
                                        <a href="lihat_pembayaran.php?id=<?php echo $row["id_pembelian"]; ?>" class="btn btn-warning"><i class="fas fa-eye"></i>
                                            Lihat Pembayaran
                                        </a>
                                    <?php endif ?>
                                </td>
                            </tr>
                            <?php $nomor++; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>

        <?php require("footer.php") ?>
    </body>

</html>