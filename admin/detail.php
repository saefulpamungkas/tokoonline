<?php require("koneksi.php");
$ambil = $conn->query("SELECT * FROM pembelian JOIN pelanggan 
ON pembelian.id_pelanggan=pelanggan.id_pelanggan
WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembelian</title>
</head>

<body>
    <h2>Detail Pembelian</h2>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <h3>Pembelian</h3>
            <p>
                Tanggal:<?php echo $detail['tanggal_pembelian']; ?><br>
                Total:Rp. <?php echo number_format($detail['total_pembelian']); ?><br>
                Status: <?php echo $detail["status_pembelian"]; ?>
            </p>
        </div>
        <div class="col-md-4">
            <h3>Pelanggan</h3>
            <strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
            <p>
                <?php echo $detail['telp_pelanggan']; ?><br>
                <?php echo $detail['email_pelanggan']; ?><br>
            </p>
        </div>
        <div class="col-md-4">
            <h3>Pengiriman</h3>
            <strong><?php echo $detail['nama_pengiriman']; ?></strong><br>
            <p>
                Tarif : Rp. <?php echo number_format($detail['tarif']); ?><br>
                Alamat: <?php echo $detail['alamat_pengiriman']; ?>
            </p>
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

</body>

</html>