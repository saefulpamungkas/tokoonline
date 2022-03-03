<?php
require("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0/css/all.min.css">
    <title>Pembelian</title>
</head>

<body>
    <h2>Data Pembelian</h2>
    <table class="table table-bordered">
        <thead>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal</th>
            <th>Status Pembelian</th>
            <th>Total</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php $nomor = 1; ?>
            <?php $ambil = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan"); ?>
            <?php while ($row = $ambil->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $row['nama_pelanggan']; ?></td>
                    <td><?php echo $row['tanggal_pembelian']; ?></td>
                    <td><?php echo $row['status_pembelian']; ?></td>
                    <td><?php echo $row['total_pembelian']; ?></td>
                    <td>
                        <a href="index.php?halaman=detail&id=<?php echo $row['id_pembelian']; ?>" class="btn btn-info"><i class="fas fa-info-circle"></i> Detail</a>

                        <?php if ($row['status_pembelian'] !== "pending") : ?>
                            <a href="index.php?halaman=pembayaran&id=<?php echo $row['id_pembelian'] ?>" class="btn btn-success"><i class="fas fa-money-bill-wave"></i> Pembayaran</a>
                        <?php endif ?>
                    </td>
                </tr>
                <?php $nomor++; ?>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>