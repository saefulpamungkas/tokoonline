<?php
require("koneksi.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0/css/all.min.css">
    <title>Produk</title>
</head>

<body>
    <h2>Data Produk</h2>
    <a href="index.php?halaman=tambahproduk" class="btn btn-primary" style="margin-bottom: 20px;">
        <i class="fas fa-plus-square"></i> Tambah data</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>kategori</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor = 1; ?>
            <?php $ambil = $conn->query("SELECT * FROM produk LEFT JOIN kategori 
            ON produk.id_kategori=kategori.id_kategori"); ?>
            <?php while ($row = $ambil->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id_produk'] ?></td>
                    <td><?php echo $row['nama_kategori'] ?></td>
                    <td><?php echo $row['nama_produk'] ?></td>
                    <td><?php echo $row['harga_produk'] ?></td>
                    <td><?php echo $row['stok_produk'] ?></td>
                    <td><?php echo $row['deskripsi_produk'] ?></td>
                    <td>
                        <img src="../foto_produk/<?php echo $row['foto_produk'] ?>" width="100">
                    </td>
                    <td>
                        <a href="index.php?halaman=editproduk&id=<?php echo $row['id_produk']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit "></i> Edit</a>
                        <a href="index.php?halaman=hapusproduk&id=<?php echo $row['id_produk']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                    </td>
                </tr>
                <?php $nomor++; ?>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>