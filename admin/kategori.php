<?php require("koneksi.php");

$semuadata = array();
$ambil = $conn->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) {
    $semuadata[] = $tiap;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fontawesome-free-6.0.0/css/all.min.css">
    <title>Data kategori</title>
</head>

<body>
    <h2>Data Kategori</h2>
    <hr>
    <a href="index.php?halaman=tambahkategori&id=<?php echo $value['id_kategori']; ?>" class="btn btn-primary btn-sm" style="margin-bottom: 20px;"><i class="fas fa-plus-square"></i> Tambah</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($semuadata as $key => $value) : ?>
                <tr>
                    <td><?php echo $key + 1 ?></td>
                    <td><?php echo $value["nama_kategori"] ?></td>
                    <td>
                        <a href="index.php?halaman=hapuskategori&id=<?php echo $value['id_kategori']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</body>

</html>