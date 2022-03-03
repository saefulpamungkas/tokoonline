<h2>Edit Produk</h2>
<?php
require("koneksi.php");

$ambil = $conn->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$row = $ambil->fetch_assoc();

?>

<?php
$datakategori = array();
$ambil = $conn->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) {
    $datakategori[] = $tiap;
}
?>

<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Kategori</label>
        <select name="id_kategori" class="form-control">
            <option value="">Pilih Kategori</option>
            <?php foreach ($datakategori as $key => $value) : ?>
                <option value="<?php echo $value["id_kategori"] ?>" <?php if ($row["id_kategori"] == $value["id_kategori"]) {
                                                                        echo "selected";
                                                                    } ?>>
                    <?php echo $value["nama_kategori"] ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="from-group">
        <label>Nama Produk</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $row['nama_produk']; ?>">
    </div>
    <div class="from-group">
        <label>Harga Rp</label>
        <input type="number" name="harga" class="form-control" value="<?php echo $row['harga_produk']; ?>">
    </div>
    <div class="from-group">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" value="<?php echo $row['stok_produk']; ?>">
    </div>
    <div class="from-group">
        <img src="../foto_produk/<?php echo $row['foto_produk'] ?>" width="100">
    </div>
    <div class="from-group">
        <label>Ganti Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <div class="from-group">
        <label>Deskripsi Produk</label>
        <textarea name="deskripsi" class="form-control" rows="10">
        <?php echo $row['deskripsi_produk']; ?>
        </textarea>
    </div>
    <button class="btn btn-primary" name="edit">Ubah</button>
</form>

<?php
if (isset($_POST['edit'])) {
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];
    //jika foto dirubah
    if (!empty($lokasifoto)) {
        move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");

        $conn->query("UPDATE produk SET nama_produk='$_POST[nama]',
        harga_produk='$_POST[harga]',stok_produk='$_POST[stok]',foto_produk='$namafoto',
        deskripsi_produk='$_POST[deskripsi]',id_kategori='$_POST[id_kategori]'
        WHERE id_produk='$_GET[id]'");
    } else {
        $conn->query("UPDATE produk SET nama_produk='$_POST[nama]',
        harga_produk='$_POST[harga]',stok_produk='$_POST[stok]',deskripsi_produk='$_POST[deskripsi]',
        id_kategori='$_POST[id_kategori]' WHERE id_produk='$_GET[id]'");
    }
    echo "<script>alert('Data produk telah di ubah');</script>";
    echo "<script>location='index.php?halaman=produk';</script>";
}
?>