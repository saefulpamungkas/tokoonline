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
    <h2>Tambah Produk</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Kategori</label>
            <select name="id_kategori" class="form-control">
                <option value="">Pilih Kategori</option>
                <?php foreach ($datakategori as $key => $value) : ?>
                    <option value="<?php echo $value["id_kategori"] ?>"><?php echo $value["nama_kategori"] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama">
        </div>
        <div class="form-group">
            <label>Harga (Rp)</label>
            <input type="number" class="form-control" name="harga">
        </div>
        <div class="form-group">
            <label>Stok</label>
            <input type="number" class="form-control" name="stok">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" name="deskripsi" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input type="file" class="form-control" name="foto">
        </div>
        <button class="btn btn-primary" name="simpan">Simpan</button>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $nama = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];
        move_uploaded_file($lokasi, "../foto_produk/" . $nama);
        $conn->query("INSERT INTO produk (nama_produk, harga_produk,stok_produk,foto_produk, deskripsi_produk,id_kategori)
        VALUES ('$_POST[nama]','$_POST[harga]','$_POST[stok]','$nama','$_POST[deskripsi]','$_POST[id_kategori]')");

        echo "<div class='alert alert-info'>Data tersimpan</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
    }
    ?>
</body>

</html>