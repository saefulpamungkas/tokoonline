<?php
require("koneksi.php");

$ambil = $conn->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) {
    $datakategori[] = $tiap;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>

<body>
    <h2>Tambah Kategori</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Kategori</label>
            <input type="number" class="form-control" name="id">
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama">
        </div>
        <button class="btn btn-primary" name="simpan">Simpan</button>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $conn->query("INSERT INTO kategori (id_kategori, nama_kategori)
        VALUES ('$_POST[id]','$_POST[nama]')");

        echo "<div class='alert alert-info'>Data tersimpan</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kategori'>";
    }
    ?>
</body>

</html>