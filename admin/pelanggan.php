<?php require("koneksi.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0/css/all.min.css">
    <title>Pelanggan</title>
</head>

<body>
    <h2>Data Pelanggan</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telephon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor = 1; ?>
            <?php $ambil = $conn->query("SELECT * FROM pelanggan"); ?>
            <?php while ($row = $ambil->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $row["nama_pelanggan"]; ?></td>
                    <td><?php echo $row["email_pelanggan"]; ?></td>
                    <td><?php echo $row["telp_pelanggan"]; ?></td>
                    <td><?php echo $row["alamat_pelanggan"]; ?></td>
                    <td>
                        <a href="index.php?halaman=hapuspelanggan&id=<?php echo $row['id_pelanggan']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></i> Hapus</a>
                    </td>
                    <?php $nomor++; ?>
                <?php } ?>
        </tbody>
    </table>
</body>

</html>